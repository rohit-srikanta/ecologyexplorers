<?php
App::uses('AppModel', 'Model');
/**
 * CloudCover Model
 *
 */
class CloudCover extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cloud_cover';
	
	public function getCloudCover()
	{
		$cloud = $this->find('list', array(
				'fields' => array(
						'CloudCover.id',
						'CloudCover.cloud_cover_name')));
	
		return $cloud;
	}

}
