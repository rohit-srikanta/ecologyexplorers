<?php
App::uses('AppModel', 'Model');
/**
 * Site Model
 *
*/
class Site extends AppModel {

	public $validate = array(
			'site_Id' => array(
					'rule' => 'notEmpty'),
			'site_name'  => array(
					'rule' => 'notEmpty'),
			'zipcode' => array(
					'rule' => array('postal', null, 'us'),
					'message' => 'Please enter a valid Zip code')
	);


	public function createNewSite($siteDetails)
	{
		$this->create();
		$siteDetails['Site']['date_entered'] = date('Y-m-d H:i:s');
		$siteDetails['Site']['site_id'] = $siteDetails['Site']['site_Id'];

		if($this->save($siteDetails))
		{
			return true;
		}
		else
			return false;
	}
	
	public function checkSiteIDExists($fields = null)
	{
		if($this->findBysiteId($fields) != null)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}

}
