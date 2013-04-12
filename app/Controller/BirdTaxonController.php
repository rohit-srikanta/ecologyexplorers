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

	public function modifyBirdTaxonData()
	{
		$this->BirdTaxon->recursive = 0;
		$this->set('birdTaxon', $this->BirdTaxon->find('all',array('fields'=> array('BirdTaxon.id','BirdTaxon.species_id','BirdTaxon.tsn','BirdTaxon.common_name'))));
	}
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Bird taxon ID'));
		}
	
		$this->BirdTaxon->recursive = 0;
		$post = $this->BirdTaxon->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid Bird taxon ID'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->BirdTaxon->id = $id;
			if ($this->BirdTaxon->save($this->request->data)) {
				$this->Session->setFlash('Bird details has been updated.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Unable to update bird details.');
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
	
		if ($this->BirdTaxon->delete($id)) {
			$this->Session->setFlash('Bird with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}
}