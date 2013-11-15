<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Utitlity');
/**
 * VegSamples Controller
 *
 * @property VegSample $VegSample
 */
class VegSamplesController extends AppController {
	
	public function index() {
		$this->VegSample->recursive = 0;
		$this->set('vegSamples', $this->paginate());
	}
	
	//This method is used to submit the veg data from the user.
	public function vegData()
	{
		//Submission of data is a privilege of logged in users. Checking if the user has logged it.
		if(!$this->Session->check('User'))
		{
			$this->Session->setFlash('Please login to access this page.');
      $this->redirect(array('controller' => 'teachers', 'action' => 'login'));
		}
		
		//Data is passed from the page where we choose site and class, which will be used to submit the data.
		$param = $this->passedArgs;
	
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);
	
		//Hard coding the school id of the current user
		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));
	
		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[0]));
	
		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[1]));
	
		//Prepopulating the veg taxon drop down box with the values retrieved from DB.
		$this->set('vegOptions',  ClassRegistry::init('VegTaxon')->getOrderList());
		
	
		if ($this->request->is('post'))
		{
			$this->request->data['VegSample']['site_id'] = $param[0];
			$this->request->data['VegSample']['teachers_class_id'] = $param[1];
			$this->request->data['VegSample']['habitat_id'] = $param[2];
			
			$result = $this->VegSample->validateData($this->request->data);
			
			if($result == "negative"){
				$this->Session->setFlash("Measurment fields cannot be less than zero. Please verify.");
				return;
			}
			
			if($result != false){
				$this->Session->setFlash("Duplicate data present at row ".($result).". Please verify the data entered before submitting.");
				return;
			}
			
			if($this->VegSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Vegetation Data has been saved. ");
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
	
		$body = '<br>'.$name.' has recently submitted Vegetation Data in Ecology Explorer\'s Data Center.<br><br>
							'.$name.' registered email is '.$email;
		$subject = 'New Vegetation Data submitted at Ecology Explorers Data Center';
		$to = 'admin';
	
		$this->sendEmail($body,$to,$subject);
	}
	
	public function modifyVegData()
	{
		//Checking if the user logged in is an admin.
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->VegSample->recursive = 0;
			$startDate = $this->request->params['pass']['0'];
			$endDate = $this->request->params['pass']['1'];
			$this->set('VegSample', $this->VegSample->getVegData($startDate,$endDate));
			$this->set('startDate', $startDate);
			$this->set('endDate',$endDate);
		}
	}
	
	public function edit($id = null,$startDate,$endDate) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Arthropod Data ID'));
		}
	
		$this->VegSample->recursive = 1;
		$this->set('vegOptions',  ClassRegistry::init('VegTaxon')->getOrderList());
		
		$vegData = $this->VegSample->findById($id);
		if (!$vegData) {
			throw new NotFoundException(__('Invalid Vegetaion Sample ID'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->VegSample->id = $id;
			if ($this->VegSample->saveAll($this->request->data)) {
				$this->Session->setFlash('Vegetation Data has been updated.');
				$this->redirect(array('controller' => 'VegSamples', 'action' => 'modifyVegData',$startDate,$endDate));
			} else {
				$this->Session->setFlash('Unable to update Vegetation details.');
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $vegData;
		}
	}
}
