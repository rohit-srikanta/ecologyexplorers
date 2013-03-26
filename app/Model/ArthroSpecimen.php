<?php
App::uses('AppModel', 'Model');

/**
 * ArthroSpecimen Model
 *
 * @property Trap $Trap
 * @property Sample $Sample
*/
class ArthroSpecimen extends AppModel {
	
	public $validate = array(
			'trap_no'  => array(
					'rule' => 'notEmpty'),
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
