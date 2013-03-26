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

}
