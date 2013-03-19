<?php
App::uses('AppModel', 'Model');
/**
 * Habitat Model
 *
 */
class Habitat extends AppModel {

	
	public function createHabitat($fields,$siteId)
	{
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
	
	public function getHabitatDetails($siteId,$type)
	{
		$conditions = array("Habitat.site_id" => $siteId,"Habitat.type" => $type);
		$habitat = $this->find('first', array('conditions' => $conditions));
		return $habitat;
	}
}
