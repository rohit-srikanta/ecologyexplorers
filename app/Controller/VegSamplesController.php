<?php
App::uses('AppController', 'Controller');
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
			$this->redirect(array(
					'action' => 'login'));
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
			
			if($this->VegSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Vegetation Data has been saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
		}
	
	}
}
