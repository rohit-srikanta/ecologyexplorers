<?php
App::uses('AppModel', 'Model');

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
		$siteDetails['Habitat']['school_id'] = $siteDetails['Site']['school'];
		if($this->save($siteDetails['Site']) && ClassRegistry::init('Habitat')->createHabitat($siteDetails['Habitat'],$this->getInsertID()))
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
	
	public function getTeachersSites($schoolId)
	{
		if($schoolId ==null)
			return false;
		$conditions = array("Site.school" => $schoolId);
		$site = $this->find('list', array('conditions' => $conditions,'fields' => array('Site.Id','Site.site_name')));
		return $site;
	}
	
	public function getSiteName($siteID)
	{
		if($siteID ==null)
			return false;
		$conditions = array("Site.id" => $siteID);
		$site = $this->find('list', array('conditions' => $conditions,'fields' => array('Site.Id','Site.site_name')));
		return $site;
	}

}
