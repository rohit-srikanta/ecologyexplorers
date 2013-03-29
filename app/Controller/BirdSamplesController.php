<?php
App::uses('AppController', 'Controller');
/**
 * BirdSamples Controller
 *
 * @property BirdSample $BirdSample
 */
class BirdSamplesController extends AppController {
	
	public function birdData()
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
	
		$this->loadModel('ArthroTaxon');
		$this->set('orderOptions', $this->ArthroTaxon->getOrderList());
	
		if ($this->request->is('post'))
		{
			$this->request->data['ArthroSample']['site_id'] = $param[0];
			$this->request->data['ArthroSample']['habitat_id'] = $param[2];
	
			if($this->ArthroSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Bird Data has be saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
		}
	
	}


}
