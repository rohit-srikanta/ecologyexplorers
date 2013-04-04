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


	public function birdData()
	{
		$param = $this->passedArgs;
		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school']));

		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[0]));

		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[1]));

		$this->set('cloudOptions', ClassRegistry::init('CloudCover')->getCloudCover());

		$this->set('birdOptions',  ClassRegistry::init('BirdTaxon')->getBirdList());

		if ($this->request->is('post'))
		{
			$this->request->data['BirdSample']['site_id'] = $param[0];
			$this->request->data['BirdSample']['habitat_id'] = $param[2];
			
			if($this->request->data['BirdSample']['temp_units'] == '1')
			{
				$this->request->data['BirdSample']['air_temp'] = ($this->request->data['BirdSample']['air_temp'] * 1.8) + 32 ;
			}

			if($this->BirdSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Bird Data has be saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
		}

	}


}
