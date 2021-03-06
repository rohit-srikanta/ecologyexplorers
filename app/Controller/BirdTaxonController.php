<?php
App::uses('AppController', 'Controller');
/**
 * BirdSamples Controller
 *
 * @property BirdSample $BirdSample
*/
class BirdTaxonController extends AppController {

	public function index() {

	}
	//UI to edit the bird taxon data.
	public function modifyBirdTaxonData()
	{
		//Checking if the user logged in is an admin.
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->BirdTaxon->recursive = 0;
			$this->set('birdTaxon', $this->BirdTaxon->find('all',array('fields'=> array('BirdTaxon.id','BirdTaxon.species_id','BirdTaxon.common_name'))));
		}
	}

	//Method to edit the arthrotaxon details. Only the taxon name and the taxon. The entry cannot be deleted.
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Bird taxon ID'));
		}

		$this->BirdTaxon->recursive = 0;
		$birdTaxon = $this->BirdTaxon->findById($id);
		if (!$birdTaxon) {
			throw new NotFoundException(__('Invalid Bird taxon ID'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->BirdTaxon->id = $id;
			if ($this->BirdTaxon->save($this->request->data)) {
				$this->Session->setFlash('Bird details has been updated.');
				$this->redirect(array('controller' => 'BirdTaxon', 'action' => 'modifyBirdTaxonData'));
			} else {
				$this->Session->setFlash('Unable to update bird details.');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $birdTaxon;
		}
	}

	//Method of adding new arthro taxon data.
	public function addBird() {
		if ($this->request->is('post')) {
			$this->BirdTaxon->create();
			if ($this->BirdTaxon->save($this->request->data)) {
				$this->Session->setFlash('Your Bird details has been saved.');
				$this->redirect(array('controller' => 'birdtaxon', 'action' => 'modifyBirdTaxonData'));
			} else {
				$this->Session->setFlash('Unable to add your bird details.');
			}
		}
	}
}