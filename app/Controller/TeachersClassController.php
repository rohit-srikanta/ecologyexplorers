<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
*/
class TeachersClassController extends AppController {

	public function createClass()
	{
		$user = $this->Session->read('User');
		$userDetails['Teachersclass']['school_id'] = $user['Teacher']['school_id'];

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		if ($this->request->is('post') || $this->request->is('put'))
		{
			if ($this->TeachersClass->createNewClass($this->request->data, $user['Teacher']['id']))
			{
				$this->Session->setFlash('Your class was created successfully.');
				$this->redirect(array('controller' => 'teachers', 'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Unable to create a new class.');
			}
		}
	}
}
