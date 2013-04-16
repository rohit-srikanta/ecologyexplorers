<?php
App::uses('AppController', 'Controller');
/**
 * VegTaxon Controller
 *

*/
class VegTaxonController extends AppController {

	public function index() {

	}

	public function modifyVegTaxonData()
	{
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->VegTaxon->recursive = 0;
			$this->set('VegTaxon', $this->VegTaxon->find('all',array('fields'=> array('VegTaxon.id','VegTaxon.species_id','VegTaxon.type','VegTaxon.common_name'))));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Vegetation taxon ID'));
		}

		$this->VegTaxon->recursive = 0;
		$VegTaxon = $this->VegTaxon->findById($id);
		if (!$VegTaxon) {
			throw new NotFoundException(__('Invalid Vegetation taxon ID'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->VegTaxon->id = $id;
			if ($this->VegTaxon->save($this->request->data)) {
				$this->Session->setFlash('Vegtation details has been updated.');
				$this->redirect(array('controller' => 'VegTaxon', 'action' => 'modifyVegTaxonData'));
			} else {
				$this->Session->setFlash('Unable to update Vegtation details.');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $VegTaxon;
		}
	}

	public function addVeg() {
		if ($this->request->is('post')) {
			$this->VegTaxon->create();
			if ($this->VegTaxon->save($this->request->data)) {
				$this->Session->setFlash('Your Vegtation details has been saved.');
				$this->redirect(array('controller' => 'VegTaxon', 'action' => 'modifyVegTaxonData'));
			} else {
				$this->Session->setFlash('Unable to add your Vegtation details.');
			}
		}
	}
}