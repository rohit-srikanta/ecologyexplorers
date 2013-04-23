<?php
App::uses('AppModel', 'Model');
/**
 * Habitat Model
 *
*/
class Habitat extends AppModel {
	
	public $belongsTo = array(
			'School' => array(
					'className' => 'School',
					'foreignKey'   => 'school_id',
			),
	);
	
	public $hasMany = array(
			'BirdSample' => array(
					'className' => 'BirdSample',
			),
			'ArthroSample' => array(
					'className' => 'ArthroSample',
			),
			'VegSample' => array(
					'className' => 'VegSample',
			)
				
	);

	//This method is used to create habitats during site creating. Since the habitat table
	public function createHabitat($fields,$siteId)
	{
		if($siteId == null || $fields == null)
			return false;
		
		$fields['date_entered'] = date('Y-m-d H:i:s');
		$fields['site_id'] = $siteId;

		if($fields['type'] == 'AR')
		{
			$fields['percent_observed']= NULL;
			$fields['radius']= NULL;
		}
		else if($fields['type'] == 'BI')
		{
			$fields['num_traps']= NULL;
			$fields['trap_arrange']= NULL;
			$fields['area']= NULL;
		}
		else if($fields['type'] == 'BR')
		{
			$fields['percent_observed']= NULL;
			$fields['radius']= NULL;
			$fields['num_traps']= NULL;
			$fields['trap_arrange']= NULL;
			$fields['area']= NULL;
		}
		else if($fields['type'] == 'VE')
		{
			$fields['percent_observed']= NULL;
			$fields['radius']= NULL;
			$fields['num_traps']= NULL;
			$fields['trap_arrange']= NULL;
		}

		if( $this->save($fields))
		{
			return true;
		}
		else
			return false;
	}
	
	//For the given site id, retieving the habitat details so that the user can check if the details are the same or needs updating.
	public function getHabitatDetails($siteId,$type)
	{
		if($siteId == null || $type == null)
			return false;

		$conditions = array("Habitat.site_id" => $siteId,"Habitat.type" => $type);
		$habitat = $this->find('first', array('conditions' => $conditions));
		return $habitat;
	}
	
}
