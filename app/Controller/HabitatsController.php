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

	public function habitatCheck()
	{
		if(!$this->Session->check('User'))
		{
			$this->Session->setFlash('Please login to access this page.');
			$this->redirect(array(
					'action' => 'login'));
		}
		
		
		$param = $this->passedArgs;
		$habitat = $this->Habitat->getHabitatDetails($param[1],$param[0]);

		if($habitat == null)
		{
			if($param[0] == "VE")
				$protocol = "Vegetation";
			else if ($param[0] == "BR")
				$protocol = "Bruchids";
			else if ($param[0] == "BI")
				$protocol = "Birds";
			else
				$protocol = "Arthropods";

			$this->Session->setFlash('Combination of Protocol '.$protocol.' and site does not exist. Please choose the correct protocol and site');
			$this->redirect(array('controller' => 'teachers','action' => 'submitData'));
		}
		$user = $this->Session->read('User');
		$userDetails['Site']['school_id'] = $user['Teacher']['school_id'];

		$this->set('schooloptions', ClassRegistry::init('School')->schoolWithID($user['Teacher']['school_id']));

		$this->set('siteOptions', ClassRegistry::init('Site')->getSiteName($param[1]));

		$habitatTypeOptions = array(array('name' => 'Arthropods','value' => 'AR'),array('name' => 'Birds','value' => 'BI'),array('name' => 'Bruchids','value' => 'BR'),array('name' => 'Vegetation','value' => 'VE'));
		$this->set('habitatTypeOptions', $habitatTypeOptions);

		$percentOptions = array(array('name' => '0','value' => '0'),array('name' => '10','value' => '10'),array('name' => '20','value' => '20'),array('name' => '30','value' => '30'),array('name' => '40','value' => '40'),array('name' => '50','value' => '50'),array('name' => '60','value' => '60'),array('name' => '70','value' => '70'),array('name' => '80','value' => '80'),array('name' => '90','value' => '90'),array('name' => '100','value' => '100'));
		$this->set('percentOptions', $percentOptions);

		if ($this->request->is('post') || $this->request->is('put'))
		{
			$this->request->data['Habitat']['id'] = $habitat['Habitat']['id'];
			$this->request->data['Habitat']['type'] = $habitat['Habitat']['type'];
			$this->request->data['Habitat']['school_id'] = $habitat['Habitat']['school_id'];
			$habitatId = $habitat['Habitat']['id'];

			$date = $this->request->data['Habitat']['recording_date']['year'].'-'.$this->request->data['Habitat']['recording_date']['month'].'-'.$this->request->data['Habitat']['recording_date']['day'];

			if($habitat['Habitat']['type'] == 'VE')
			{
				if($habitat['Habitat']['area'] == $this->request->data['Habitat']['area'] && $habitat['Habitat']['tree_canopy'] == $this->request->data['Habitat']['tree_canopy'] && $habitat['Habitat']['shrubcover'] == $this->request->data['Habitat']['shrubcover'] && $habitat['Habitat']['lawn'] == $this->request->data['Habitat']['lawn'] && $habitat['Habitat']['gravel_soil'] == $this->request->data['Habitat']['gravel_soil'] && $habitat['Habitat']['paved_building'] == $this->request->data['Habitat']['paved_building'] && $habitat['Habitat']['other'] == $this->request->data['Habitat']['other'] && $habitat['Habitat']['water'] == $this->request->data['Habitat']['water'] && $habitat['Habitat']['recording_date'] == $date)
				{
					$this->redirect(array('controller'=>'VegSamples','action' => 'vegData',$param[1],$param[2],$habitatId));
				}
				else
				{
					if($this->Habitat->createHabitat($this->request->data['Habitat'],$param[1]))
					{
						$this->Session->setFlash('Habitat Details updated.');
						$this->redirect(array('controller'=>'VegSamples','action' => 'vegData',$param[1],$param[2],$habitatId));
					}
					else
					{
						$this->Session->setFlash('Unable to update the habitat details.');
					}
				}
			}
			if($habitat['Habitat']['type'] == 'AR')
			{
				if($habitat['Habitat']['num_traps'] == $this->request->data['Habitat']['num_traps'] && $habitat['Habitat']['tree_canopy'] == $this->request->data['Habitat']['tree_canopy'] && $habitat['Habitat']['shrubcover'] == $this->request->data['Habitat']['shrubcover'] && $habitat['Habitat']['lawn'] == $this->request->data['Habitat']['lawn'] && $habitat['Habitat']['gravel_soil'] == $this->request->data['Habitat']['gravel_soil'] && $habitat['Habitat']['paved_building'] == $this->request->data['Habitat']['paved_building'] && $habitat['Habitat']['other'] == $this->request->data['Habitat']['other'] && $habitat['Habitat']['water'] == $this->request->data['Habitat']['water'] && $habitat['Habitat']['trap_arrange'] == $this->request->data['Habitat']['trap_arrange'] && $habitat['Habitat']['recording_date'] == $date)
				{
					$this->redirect(array('controller'=>'arthroSamples','action' => 'arthropodData',$param[1],$param[2],$habitatId));
				}
				else
				{
					if($this->Habitat->createHabitat($this->request->data['Habitat'],$param[1]))
					{
						$this->Session->setFlash('Habitat Details updated.');
						$this->redirect(array('controller'=>'arthroSamples','action' => 'arthropodData',$param[1],$param[2],$habitatId));
					}
					else
					{
						$this->Session->setFlash('Unable to update the habitat details.');
					}
				}
			}
			if($habitat['Habitat']['type'] == 'BI')
			{
				if($habitat['Habitat']['percent_observed'] == $this->request->data['Habitat']['percent_observed'] && $habitat['Habitat']['tree_canopy'] == $this->request->data['Habitat']['tree_canopy'] && $habitat['Habitat']['shrubcover'] == $this->request->data['Habitat']['shrubcover'] && $habitat['Habitat']['lawn'] == $this->request->data['Habitat']['lawn'] && $habitat['Habitat']['gravel_soil'] == $this->request->data['Habitat']['gravel_soil'] && $habitat['Habitat']['paved_building'] == $this->request->data['Habitat']['paved_building'] && $habitat['Habitat']['other'] == $this->request->data['Habitat']['other'] && $habitat['Habitat']['water'] == $this->request->data['Habitat']['water'] && $habitat['Habitat']['radius'] == $this->request->data['Habitat']['radius'] && $habitat['Habitat']['recording_date'] == $date)
				{
					$this->redirect(array('controller'=>'birdSamples','action' => 'birdData',$param[1],$param[2],$habitatId));
				}
				else
				{
					if($this->Habitat->createHabitat($this->request->data['Habitat'],$param[1]))
					{
						$this->Session->setFlash('Habitat Details updated.');
						$this->redirect(array('controller'=>'birdSamples','action' => 'birdData',$param[1],$param[2],$habitatId));
					}
					else
					{
						$this->Session->setFlash('Unable to update the habitat details.');
					}
				}
			}

			$this->request->data = $this->Habitat->getHabitatDetails($param[1],$param[0]);
		}

		if (!$this->request->data)
		{
			$this->request->data = $habitat;
		}
	}
}