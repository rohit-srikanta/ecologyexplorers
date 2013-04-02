<?php
App::uses('AppModel', 'Model');
/**
 * BirdSpecimen Model
 *
 */
class BirdSpecimen extends AppModel {
	
	public $validate = array(
			'frequency'  => array(
					'rule' => 'notEmpty')
	);
	
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
