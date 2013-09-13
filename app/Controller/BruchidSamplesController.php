<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Utitlity');
/**
 * BruchidSamples Controller
 *
 * @property BruchidSample $BruchidSample
*/
class BruchidSamplesController extends AppController {

	public function index() {
		$this->BruchidSample->recursive = 0;
		$this->set('bruchidSamples', $this->paginate());
	}

	//This method is used to submit the bruchid data from the user.
	public function bruchidData()
	{
		//Submission of data is a privilege of logged in users. Checking if the user has logged it.
		if(!$this->Session->check('User'))
		{
			$this->Session->setFlash('Please login to access this page.');
			$this->redirect(array(
					'action' => 'login'));
		}
		
		//Data is passed from the page where we choose site and class, which will be used to submit the data.
		$param = $this->passedArgs;
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);

		//Hard coding the school id of the current user
		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[1]));

		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[2]));

		//Setting the dropdown options during the bruchid data submissions. 
		$habOptions = array(array('name' => 'Urban','value' => 'Urban'),array('name' => 'Desert','value' => 'Desert'));
		$treeOptions = array(array('name' => 'Blue Palo Verde','value' => 'B'),array('name' => 'Foothills Palo Verde','value' => 'F'));

		$this->set('habOptions', $habOptions);

		$this->set('treeOptions', $treeOptions);

		if ($this->request->is('post'))
		{
			//Explicit conditions to check if the user has selected the tree type or site type.
			if($this->request->data['BruchidSample']['tree_type'] == null )
			{
				$this->Session->setFlash('Please select the tree type');
				return;
			}
			if($this->request->data['BruchidSample']['site_type'] == null)
			{
				$this->Session->setFlash('Please select the site type');
				return;
			}
					
			$result = $this->BruchidSample->validateData($this->request->data);
			
			if($result == "negative"){
				$this->Session->setFlash("Measurment fields cannot be less than zero. Please verify.");
				return;
			}
			
			if($result != false){
				$this->Session->setFlash("Duplicate data present at row ".($result).". Please verify the data entered before submitting.");
				return;
			}
				
			$this->request->data['BruchidSample']['site_id'] = $param[1];
			$this->request->data['BruchidSample']['teachers_class_id'] = $param[2];

			if($this->BruchidSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Bruchid Beetles Data has been saved. ");
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
	
		$body = '<br>'.$name.' has recently submitted Bruchid Beetles Data in Ecology Explorer\'s Data Center.<br><br>
							'.$name.' registered email is '.$email;
		$subject = 'New Bruchid Beetles Data submitted at Ecology Explorers Data Center';
		$to = 'admin';
	
		$this->sendEmail($body,$to,$subject);
	}

}
