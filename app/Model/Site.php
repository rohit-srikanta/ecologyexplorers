<?php
App::uses('AppModel', 'Model');
App::import('model','Habitat');
/**
 * Site Model
 *
*/
class Site extends AppModel {
	
	var $uses = array('Site', 'Habitat');

	public $validate = array(
			'site_Id' => array(
					'rule' => 'notEmpty'),
			'site_name'  => array(
					'rule' => 'notEmpty'),
			'address'  => array(
					'rule' => 'notEmpty'),
			'city'  => array(
					'rule' => 'notEmpty'),
			'site_name'  => array(
					'rule' => 'notEmpty'),
			'zipcode' => array(
					'rule' => array('postal', null, 'us'),
					'message' => 'Please enter a valid zipcode')
	);


	public function createNewSite($siteDetails)
	{
		$this->create();
		$siteDetails['Site']['date_entered'] = date('Y-m-d H:i:s');
		$siteDetails['Site']['site_id'] = $siteDetails['Site']['site_Id'];
		$siteDetails['Habitat']['recording_date'] = $siteDetails['Habitat']['recording_date']['year'].'-'.$siteDetails['Habitat']['recording_date']['month'].'-'.$siteDetails['Habitat']['recording_date']['day'];
		$siteDetails['Habitat']['school_id'] = $siteDetails['Site']['school'];

		$hab = new Habitat();
		
		if($this->save($siteDetails['Site']) && $hab->createHabitat($siteDetails['Habitat'],$this->getInsertID()))
		{
			return true;
		}
		else
			return false;
	}
	
	public function validateVegetation($fields)
	{
		
		if(100 < ($fields['gravel_soil'] +$fields['lawn']+$fields['paved_building']+$fields['other']+$fields['water']))
			return true;
		else 
			return false;
		
	}
	public function checkSiteIDExists($fields = null)
	{
		if($this->findBySiteId($fields) != null)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}

}
