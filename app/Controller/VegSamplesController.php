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
	
	
	public function vegData()
	{
		$param = $this->passedArgs;
	
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);
	
		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));
	
		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[0]));
	
		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[1]));
	
		$this->set('vegOptions',  ClassRegistry::init('VegTaxon')->getOrderList());
		
		$this->set('typeOptions',  ClassRegistry::init('VegTaxon')->getOrderList());
	
		if ($this->request->is('post'))
		{
			$this->request->data['VegSample']['site_id'] = $param[0];
			$this->request->data['VegSample']['teachers_class_id'] = $param[1];
			$this->request->data['VegSample']['habitat_id'] = $param[2];
			
			if($this->VegSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Vegetation Data has be saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
		}
	
	}
}
