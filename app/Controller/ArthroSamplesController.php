<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Utitlity');

/**
 * ArthroSamples Controller
 *
 * @property ArthroSample $ArthroSample
*/
class ArthroSamplesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->ArthroSample->recursive = 0;
		$this->set('arthroSamples', $this->paginate());
	}

	//This method is used to submit the anthropod data from the user.
	public function arthropodData()
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

		//Prepopulating the arthrotaxon drop down box with the values retrieved from DB.
		$this->set('orderOptions',  ClassRegistry::init('ArthroTaxon')->getOrderList());

		if ($this->request->is('post'))
		{
			$this->request->data['ArthroSample']['site_id'] = $param[0];
			$this->request->data['ArthroSample']['teachers_class_id'] = $param[1];
			$this->request->data['ArthroSample']['habitat_id'] = $param[2];
			
		
			$result = $this->ArthroSample->validateData($this->request->data);
			
			if($result == "negative"){
				$this->Session->setFlash("Tally number cannot be less than zero.");
				return;
			}
			
			if($result != false){
				$this->Session->setFlash("Duplicate data present at row ".($result).". Please verify the data entered before submitting.");
				return;
			}

			if($this->ArthroSample->savingthedata($this->request->data))
			{				
				$this->Session->setFlash("Arthropod Data has been saved. ");
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
		
		$body = '<br>'.$name.' has recently submitted Arthropod Data in Ecology Explorer\'s Data Center.<br><br>
							'.$name.' registered email is '.$email;
		$subject = 'New Arthropod Data submitted at Ecology Explorers Data Center';
		$to = 'admin';
		
		$this->sendEmail($body,$to,$subject);
	}

}
