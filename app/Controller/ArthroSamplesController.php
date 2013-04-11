<?php
App::uses('AppController', 'Controller');
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

	public function arthropodData()
	{
		$param = $this->passedArgs;

		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[0]));

		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[1]));

		$this->set('orderOptions',  ClassRegistry::init('ArthroTaxon')->getOrderList());

		if ($this->request->is('post'))
		{
			$this->request->data['ArthroSample']['site_id'] = $param[0];
			$this->request->data['ArthroSample']['teachers_class_id'] = $param[1];
			$this->request->data['ArthroSample']['habitat_id'] = $param[2];

			if($this->ArthroSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Arthropod Data has be saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
		}

	}

}
