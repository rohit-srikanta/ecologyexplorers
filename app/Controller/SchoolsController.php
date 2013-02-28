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

	public function createSchool()
	{
		if ($this->request->is('post'))
		{
			if($this->School->checkSchoolIdPresent($this->request->data['School']['school_Id']))
			{
				$this->Session->setFlash('School ID exists. Please try with a different School ID.');
			}
			else
			{
				if($this->School->createSchool($this->request->data))
						
					$this->Session->setFlash("School Created");
				else
					$this->Session->setFlash("Unable to create the School. Please check the values entered");
			}
		}

	}
}
