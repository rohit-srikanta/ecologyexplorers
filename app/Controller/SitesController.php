<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
*/
class SitesController extends AppController {

	var $uses = array('Site','Habitat');
	public $components = array('RequestHandler');
	public $helpers = array('Js');
	
	//The method is called to create a new site for the users school. The site can be for any of the protocols. During the site creation, we also create the habitat.
	//The habitat is associated with only the 3 protocols, Arthropods,Vegetation and Birds. Bruchid will only have sites associated with it.
	public function createSite()
	{
		if(!$this->Session->check('User'))
		{
			$this->Session->setFlash('Please login to access this page.');
      $this->redirect(array('controller' => 'teachers', 'action' => 'login'));

		}
		
		
		$user = $this->Session->read('User');
		$userDetails['Site']['school_id'] = $user['Teacher']['school_id'];

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));
		
		$habitatTypeOptions = array(array('name' => 'Arthropods','value' => 'AR'),array('name' => 'Birds','value' => 'BI'),array('name' => 'Bruchids','value' => 'BR'),array('name' => 'Vegetation','value' => 'VE'));
		$this->set('habitatTypeOptions', $habitatTypeOptions);
		
		$percentOptions = array(array('name' => '0','value' => '0'),array('name' => '10','value' => '10'),array('name' => '20','value' => '20'),array('name' => '30','value' => '30'),array('name' => '40','value' => '40'),array('name' => '50','value' => '50'),array('name' => '60','value' => '60'),array('name' => '70','value' => '70'),array('name' => '80','value' => '80'),array('name' => '90','value' => '90'),array('name' => '100','value' => '100'));
		$this->set('percentOptions', $percentOptions);
		
		if ($this->request->is('post') || $this->request->is('put'))
		{

			if($this->Site->checkSiteIDExists($this->request->data['Site']['site_id']))
			{
				$this->Session->setFlash('Site ID already exists. Please try a different one.');
			}
			else if($this->Site->validateVegetation($this->request->data['Habitat']))
			{
				$this->Session->setFlash('Habitat Vegetation and Non-Vegetation within 0 m - 0.15 m should add up to 100 %.');
			}
			else if($this->request->data['Habitat']['type'] == '')
			{
				$this->Session->setFlash('Please select the habitat type');
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
					$this->Session->setFlash('Unable to create a new site. Please correct the errors shown below.');
				}
			}
		}
	}
}
