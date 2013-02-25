<?php
App::uses('AppController', 'Controller');
/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
*/
class TeachersController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->paginate());
	}


	//Method to validate the user credentials before login.
	public function login($fields = null) {
			
		if ($this->request->is('post'))
		{
			$user = $this->Teacher->validateLogin($this->request->data['Teacher']['username'],$this->request->data['Teacher']['password']);
			if ($user)
			{
				//Logout previous user, if any.
				if($this->Session->check('User'))
				{
					$this->Session->destroy();
				}
				//Writing the user information into the session variable and redirecting to the home page. 
				$this->Session->setFlash('Login Successful');
				$this->Session->write('User', $user);
				$this->redirect(array(
						'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Unable to login. Please check your username and password');
			}
		}
	}

	//Method to logout the user.
	public function logout() {

		if($this->Session->check('User'))
		{
			$this->Session->destroy();
			$this->Session->setFlash('You have been logged out!');
			$this->redirect(array(
					'action' => 'index'));
			exit();
		}
		else
		{
			$this->Session->setFlash('You have not logged in.');
			$this->redirect(array('action' => 'index'));
		}
	}

	//Method that redirects to the home page of the techer model.
	public function back()
	{
		$this->redirect(array('action' => 'index'));
	}

	//Method to register a new teacher into the system.
	public function register()
	{
		//Loading the school model so that the school dropdown can be populated.
		$this->loadModel('School');
		$school = $this->School->loadSchools();
		$this->set('schools', $school);
		
		if ($this->request->is('post'))
		{
			$this->Teacher->create();
			
			//Check to see if the username already exists in the database.
			if($this->Teacher->checkUsernameExists($this->request->data['Teacher']['username']))
			{
				$this->Session->setFlash('Username already exists. Please try with a different username.');
			}
			else
			{
				//If the above validation, along with the model validation is satisfied, create the user profile.
				if ($this->Teacher->createUser($this->request->data))
				{
					$this->Session->setFlash('New user profile created!. Please login to access the data');

					//If user already logged in, destroy the session variable
					if($this->Session->check('User'))
					{
						$this->Session->destroy();
					}
					//After registering, the user is redirected to the main page.
					$this->redirect(array(
							'action' => 'index'));
				}
				else
				{
					//Errors that has to be fixed before creating user profile.
					$this->Session->setFlash('Unable to create profile. Please try again after correcting the errors shown below.');
				}
			}

		}
	}
}
