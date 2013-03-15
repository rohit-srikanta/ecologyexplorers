<?php
App::uses('AppController', 'Controller');
/**
 * Habitats Controller
 *
 * @property Habitat $Habitat
*/
class HabitatsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */

	public function index() {
		$this->Habitat->recursive = 0;
		$this->set('habitats', $this->paginate());
	}

	public function defineHabitat()
	{
		$user = $this->Session->read('User');
		$userDetails['Site']['school'] = $user['Teacher']['school'];

		$this->loadModel('School');
		$this->set('schooloptions', $this->School->schoolWithID($user['Teacher']['school']));

		$habitatTypeOptions = array(array('name' => 'Arthropods','value' => 'AR'),array('name' => 'Birds','value' => 'BI'),array('name' => 'Vegetation','value' => 'VE'),array('name' => 'Bruchids','value' => 'BR'));
		$this->set('habitatTypeOptions', $habitatTypeOptions);

		$percentOptions = array(array('name' => '0','value' => '0'),array('name' => '10','value' => '10'),array('name' => '20','value' => '20'),array('name' => '30','value' => '30'),array('name' => '40','value' => '40'),array('name' => '50','value' => '50'),array('name' => '60','value' => '60'),array('name' => '70','value' => '70'),array('name' => '80','value' => '80'),array('name' => '90','value' => '90'),array('name' => '100','value' => '100'));
		$this->set('percentOptions', $percentOptions);
		

		if ($this->request->is('post') || $this->request->is('put'))
		{
			/*if ($this->Habitat->createNewSite($this->request->data))
			{
				$this->Session->setFlash('Your site was created successfully.');
				$this->redirect(array('controller' => 'teachers', 'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Unable to create a new site.');
			}*/
		}
	}
}