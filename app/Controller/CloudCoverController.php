<?php
App::uses('AppController', 'Controller');
/**
 * BirdSamples Controller
 *
 * @property BirdSample $BirdSample
*/
class CloudCoverController extends AppController {

	public function index() {

	}

	public function modifyCloudCover()
	{
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->CloudCover->recursive = 0;
			$this->set('CloudCover', $this->CloudCover->find('all',array('fields'=> array('CloudCover.id','CloudCover.cloud_cover_name'))));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Cloud Cover ID'));
		}

		$this->CloudCover->recursive = 0;
		$CloudCover = $this->CloudCover->findById($id);
		if (!$CloudCover) {
			throw new NotFoundException(__('Invalid CloudCoverID'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->CloudCover->id = $id;
			if ($this->CloudCover->save($this->request->data)) {
				$this->Session->setFlash('Cloud Cover  has been updated.');
				$this->redirect(array('controller' => 'CloudCover', 'action' => 'modifyCloudCover'));
			} else {
				$this->Session->setFlash('Unable to update Cloud Cover.');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $CloudCover;
		}
	}

	public function addCloudCover() {
		if ($this->request->is('post')) {
			$this->CloudCover->create();
			if ($this->CloudCover->save($this->request->data)) {
				$this->Session->setFlash('Your Cloud Cover details has been saved.');
				$this->redirect(array('controller' => 'CloudCover', 'action' => 'modifyCloudCover'));
			} else {
				$this->Session->setFlash('Unable to add your Cloud Cover details.');
			}
		}
	}
}