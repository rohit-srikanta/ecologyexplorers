<?php
App::uses('AppController', 'Controller');
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
				$this->request->data['BirdSample']['air_temp'] = ($this->request->data['BirdSample']['air_temp'] * 1.8) + 32 ;
			}
			
			if($this->BirdSample->checkNegativeNumbers($this->request->data)){
				$this->Session->setFlash("Number of birds cannot be less than zero");
				return;
			}

			if($this->BirdSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Bird Data has been saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'dataSubmissionSuccess'));
			}
			else{
				$this->Session->setFlash("Unable to save the data. Please check the data and try again.");				
			}
		}
	}
}
