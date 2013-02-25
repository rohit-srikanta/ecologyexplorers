<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 * @property School $School
 * @property School $School
*/
class School extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'school_id' => array(
					'notempty' => array(
							'rule' => array('notempty'),
					),
			),
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	public $hasMany = array(
			'School' => array(
					'className' => 'School',
					'foreignKey' => 'school_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);

	public function loadSchools()
	{
		$school = $this->find('list', array(
				'fields' => array(
						'School.school_Id',
						'School.school_Name')));
		
		return $school;
	}

}
