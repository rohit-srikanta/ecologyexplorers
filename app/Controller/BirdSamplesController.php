<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Utitlity');
/**
 * BirdSamples Controller
 *
 * @property BirdSample $BirdSample
*/
class BirdSamplesController extends AppController {

	public function index() {
		$this->BirdSample->recursive = 0;
		$this->set('birdSamples', $this->paginate());
	}

	//This method is used to submit the bird data from the user.
	public function birdData()
	{
		//Submission of data is a privilege of logged in users. Checking if the user has logged it.
		if(!$this->Session->check('User'))
		{
			$this->Session->setFlash('Please login to access this page.');
			$this->redirect(array(
					'action' => 'login'));
		}
		
		//Data is passed from the habitat check page which will be used to submit the data.
		$param = $this->passedArgs;
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);

		//Hard coding the school id of the current user
		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[0]));

		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[1]));

		//Retrieving the cloud index from the database so that it can be linked during data submission
		$this->set('cloudOptions', ClassRegistry::init('CloudCover')->getCloudCover());

		//Prepopulating the birdtaxon drop down box with the values retrieved from DB.
		$this->set('birdOptions',  ClassRegistry::init('BirdTaxon')->getBirdList());

		if ($this->request->is('post'))
		{
			$this->request->data['BirdSample']['site_id'] = $param[0];
			$this->request->data['BirdSample']['teachers_class_id'] = $param[1];
			$this->request->data['BirdSample']['habitat_id'] = $param[2];
			
			//Data holds only the Temperature in fahrenheit. If the user chooses Celcius, then convert it to F before commiting the data
			if($this->request->data['BirdSample']['temp_units'] == '1')
			{
				$this->request->data['BirdSample']['air_temp'] = intval(($this->request->data['BirdSample']['air_temp'] * 1.8) + 32) ;
			}
			
			$result = $this->BirdSample->validateData($this->request->data);

			if($result == "negative"){
				$this->Session->setFlash("Number of birds cannot be less than zero.");
				return;
			}
				
			if($result != false){
				$this->Session->setFlash("Duplicate data present at row ".($result).". Please verify the data entered before submitting.");
				return;
			}

			if($this->BirdSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Bird Data has been saved. ");
				$this->sendEmailNotification();
				$this->redirect(array('controller' => 'teachers','action' => 'dataSubmissionSuccess'));
			}
			else{
				$this->Session->setFlash("Unable to save the data. Please check the data and try again.");				
			}
		}
	}
	
	public function sendEmailNotification()
	{
		$user = $this->Session->read('User');
		$name = $user['Teacher']['name'];
		$email =$user['Teacher']['email_address'];
	
		$body = '<br>'.$name.' has recently submitted Birds Data in Ecology Explorer\'s Data Center.<br><br>
							'.$name.' registered email is '.$email;
		$subject = 'New Birds Data submitted at Ecology Explorers Data Center';
		$to = 'admin';
	
		$this->sendEmail($body,$to,$subject);
	}
	
	public function modifyBirdData()
	{
		//Checking if the user logged in is an admin.
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->BirdSample->recursive = 0;
			$startDate = $this->request->params['pass']['0'];
			$endDate = $this->request->params['pass']['1'];
			$this->set('BirdSample', $this->BirdSample->getBirdData($startDate,$endDate));
			$this->set('startDate', $startDate);
			$this->set('endDate',$endDate);
		}
	}
	
	public function edit($id = null,$startDate,$endDate) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Arthropod Data ID'));
		}
	
		$this->BirdSample->recursive = 0;
		$BirdData = $this->BirdSample->findById($id);
		if (!$BirdData) {
			throw new NotFoundException(__('Invalid Arthropod Sample ID'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->BirdSample->id = $id;
			if ($this->BirdSample->save($this->request->data)) {
				$this->Session->setFlash('Bird Data has been updated.');
				$this->redirect(array('controller' => 'BirdSamples', 'action' => 'modifyBirdData',$startDate,$endDate));
			} else {
				$this->Session->setFlash('Unable to update Bird details.');
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $BirdData;
		}
	}
	
	
}
