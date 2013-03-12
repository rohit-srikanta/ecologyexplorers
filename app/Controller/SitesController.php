<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
*/
class SitesController extends AppController {

	public function createSite()
	{
		$user = $this->Session->read('User');
		$userDetails['Site']['school'] = $user['Teacher']['school'];

		$this->loadModel('School');
		$this->set('schooloptions', $this->School->schoolWithID($user['Teacher']['school']));

		if ($this->request->is('post') || $this->request->is('put'))
		{
				
			if($this->Site->checkSiteIDExists($this->request->data['Site']['site_Id']))
			{
				$this->Session->setFlash('Site ID already exists. Please try a different one.');
			}
			else
			{
				if ($this->Site->createNewSite($this->request->data))
				{
					$this->Session->setFlash('Your site was created successfully.');
					$this->redirect(array('controller' => 'teachers', 'action' => 'index'));
				}
				else
				{
					$this->Session->setFlash('Unable to create a new site.');
				}
			}
		}

	}

}
