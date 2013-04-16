<?php
App::uses('AppController', 'Controller');
/**
 * Schools Controller
 *
 * @property School $School
*/
class SchoolsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->School->recursive = 0;
		$this->set('schools', $this->paginate());
	}

	/*This method is used to create new schools in the database.
	 *We first check if the user has the necessary admin privileges to create a school
	*Validation to check if the school id given already exists and later if all
	*the data is acceptable, the school is created */
	public function createSchool()
	{
		if('A' != $this->Session->read('UserType'))
		{
			$this->Session->setFlash(__('You do not have permissions to access this page !'));
			$this->redirect(array(
					'action' => 'index'));
		}
		else
		{
			if ($this->request->is('post'))
			{
				if($this->School->checkSchoolIdPresent($this->request->data['School']['school_id']))
				{
					$this->Session->setFlash('School ID exists. Please try with a different School ID.');
				}
				else
				{
					if($this->School->createSchool($this->request->data))
					{
						$this->Session->setFlash("School Created");
						$this->redirect(array('controller' => 'teachers', 'action' => 'index'));
					}
					else
						$this->Session->setFlash("Unable to create the School. Please check the values entered");
				}
			}

		}
	}
}
