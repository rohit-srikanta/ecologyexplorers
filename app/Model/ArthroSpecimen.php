<?php
App::uses('AppModel', 'Model');
/**
 * ArthroSpecimen Model
 *
 * @property Trap $Trap
 * @property Sample $Sample
 */
class ArthroSpecimen extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'trap_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'frequency' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Trap' => array(
			'className' => 'Trap',
			'foreignKey' => 'trap_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sample' => array(
			'className' => 'Sample',
			'foreignKey' => 'sample_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
