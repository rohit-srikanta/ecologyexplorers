<?php
App::uses('AppController', 'Controller');
/**
 * ArthroSamples Controller
 *
 * @property ArthroSample $ArthroSample
 */
class ArthroSamplesController extends AppController {

	var $uses = array('Site', 'ArthroSamples','TeachersClass');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArthroSample->recursive = 0;
		$this->set('arthroSamples', $this->paginate());
	}
	
	public function arthropodData()
	{
		$param = $this->passedArgs;
		
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);
				
		$this->loadModel('School');
		$this->set('schooloptions', $this->School->schoolWithID($user['Teacher']['school']));
		
		$this->loadModel('Site');
		$this->set('siteOptions', $this->Site->getSiteName($param[0]));
		
		$this->loadModel('TeachersClass');
		$this->set('classOptions', $this->TeachersClass->getClassName($param[1]));
		
		if ($this->request->is('post'))
		{
			$this->request->data['ArthroSamples']['site_id'] = $param[0];
			$this->request->data['ArthroSamples']['habitat_id'] = $param[2];
			
			pr($this->request->data);
		}
		
	}

}
