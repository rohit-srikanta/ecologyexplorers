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
				
			$this->request->data['BruchidSample']['site_id'] = $param[1];
			$this->request->data['BruchidSample']['teachers_class_id'] = $param[2];

			if($this->BruchidSample->savingthedata($this->request->data))
			{
				$this->Session->setFlash("Beetles Data has been saved. ");
				$this->redirect(array('controller' => 'teachers','action' => 'index'));
			}
				
		}

	}

}
