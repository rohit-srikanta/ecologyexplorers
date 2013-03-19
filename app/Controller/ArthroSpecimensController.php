<?php
App::uses('AppController', 'Controller');
/**
 * ArthroSpecimens Controller
 *
 * @property ArthroSpecimen $ArthroSpecimen
 */
class ArthroSpecimensController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArthroSpecimen->recursive = 0;
		$this->set('arthroSpecimens', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ArthroSpecimen->exists($id)) {
			throw new NotFoundException(__('Invalid arthro specimen'));
		}
		$options = array('conditions' => array('ArthroSpecimen.' . $this->ArthroSpecimen->primaryKey => $id));
		$this->set('arthroSpecimen', $this->ArthroSpecimen->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArthroSpecimen->create();
			if ($this->ArthroSpecimen->save($this->request->data)) {
				$this->Session->setFlash(__('The arthro specimen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arthro specimen could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ArthroSpecimen->exists($id)) {
			throw new NotFoundException(__('Invalid arthro specimen'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArthroSpecimen->save($this->request->data)) {
				$this->Session->setFlash(__('The arthro specimen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arthro specimen could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ArthroSpecimen.' . $this->ArthroSpecimen->primaryKey => $id));
			$this->request->data = $this->ArthroSpecimen->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ArthroSpecimen->id = $id;
		if (!$this->ArthroSpecimen->exists()) {
			throw new NotFoundException(__('Invalid arthro specimen'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ArthroSpecimen->delete()) {
			$this->Session->setFlash(__('Arthro specimen deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Arthro specimen was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
