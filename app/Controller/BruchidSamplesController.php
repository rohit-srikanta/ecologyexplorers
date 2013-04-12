<?php
App::uses('AppController', 'Controller');
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


	public function bruchidData()
	{
		$param = $this->passedArgs;


		$user = $this->Session->read('User');
		$this->set('teacherName', $user['Teacher']['name']);

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		$this->set('siteOptions',ClassRegistry::init('Site')->getSiteName($param[1]));

		$this->set('classOptions', ClassRegistry::init('TeachersClass')->getClassName($param[2]));

		$habOptions = array(array('name' => 'Urban','value' => 'Urban'),array('name' => 'Desert','value' => 'Desert'));
		$treeOptions = array(array('name' => 'Blue Palo Verde','value' => 'B'),array('name' => 'Foothills Palo Verde','value' => 'F'));

		$this->set('habOptions', $habOptions);

		$this->set('treeOptions', $treeOptions);

		if ($this->request->is('post'))
		{
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
				
			$this->request->data['BruchidSample']['site_id'] = $param[1];
			$this->request->data['BruchidSample']['teachers_class_id'] = $param[2];

			if($this->BruchidSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Beetles Data has be saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
				
		}

	}

}
