<?php
App::uses('AppController', 'Controller');
/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
*/
class TeachersController extends AppController {
	public $helpers = array('Html', 'Form');
	/**
	 * index method
	 *
	 * @return void
	*/
	public function index()
	{
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->paginate());
	}


	//Method to validate the user credentials before login.
	public function login($fields = null)
	{
		if($this->Session->check('User'))
		{
			$this->Session->setFlash('You have already logged in. Please logout.');
			$this->redirect(array(
					'action' => 'index'));
				
		}

		if ($this->request->is('post'))
		{
	
			$user = $this->Teacher->validateLogin($this->request->data['Teacher']['username'],$this->request->data['Teacher']['password']);
			if ($user)
			{
				//Writing the user information into the session variable and redirecting to the home page.
				$this->Session->setFlash('Login Successful');
				$this->Session->write('User', $user);
				$this->Session->write('UserType',$user['Teacher']['type']);
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
	public function logout()
	{
		if($this->Session->check('User'))
		{
			$this->Session->destroy();
			$this->Session->setFlash('You have been logged out!');
			$this->redirect(array(
					'action' => 'index'));
			exit();
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
			//$this->Teacher->create();

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
					$this->Session->setFlash(__('You can enter your data once your profile is approved. Until then check our existing data.'));
					
					//After registering, the user is redirected to the main page.
					$this->redirect(array(
							'action' => 'index'));
				}
				else
				{
					//Errors that has to be fixed before creating user profile.
					$this->Session->setFlash(__('Unable to create profile. Please try again after correcting the errors shown below.'));
				}
			}
		}
	}

	public function approveUser()
	{
		$query = $this->Teacher->getUsers();
		$this->set('teachersYetToBeApproved', $query);
		
		if ($this->request->is('post'))
		{
			$temp['value'] = $this->request->data['Approve'];

			for($i=0; $i<count($query); $i++)
			{
				if(1 == $temp['value'][$query[$i]['Teacher']['id']])
					$this->Teacher->approveUser($query[$i]['Teacher']['id'], 'T');
			}
			
			$this->set('teachersYetToBeApproved', $this->Teacher->getUsers());
		}
	}
}
