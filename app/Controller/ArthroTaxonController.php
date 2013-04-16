<?php
App::uses('AppController', 'Controller');
/**
 * ArthroTaxon Controller
 *
*/
class ArthroTaxonController extends AppController {

	public function index() {

	}

	public function modifyArthroTaxonData()
	{
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
		}
		else
		{
			$this->ArthroTaxon->recursive = 0;
			$this->set('ArthroTaxon', $this->ArthroTaxon->find('all',array('fields'=> array('ArthroTaxon.id','ArthroTaxon.taxon','ArthroTaxon.taxon_name'))));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Arthropod taxon ID'));
		}

		$this->ArthroTaxon->recursive = 0;
		$ArthroTaxon = $this->ArthroTaxon->findById($id);
		if (!$ArthroTaxon) {
			throw new NotFoundException(__('Invalid Arthropod taxon ID'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->ArthroTaxon->id = $id;
			if ($this->ArthroTaxon->save($this->request->data)) {
				$this->Session->setFlash('Arthropod details has been updated.');
				$this->redirect(array('controller' => 'ArthroTaxon', 'action' => 'modifyArthroTaxonData'));
			} else {
				$this->Session->setFlash('Unable to update Arthropod details.');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $ArthroTaxon;
		}
	}

	public function addArthro() {
		if ($this->request->is('post')) {
			$this->ArthroTaxon->create();
			if ($this->ArthroTaxon->save($this->request->data)) {
				$this->Session->setFlash('Your Arthropod details has been saved.');
				$this->redirect(array('controller' => 'ArthroTaxon', 'action' => 'modifyArthroTaxonData'));
			} else {
				$this->Session->setFlash('Unable to add your Arthropod details.');
			}
		}
	}
}