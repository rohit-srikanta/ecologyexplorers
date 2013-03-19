<?php
App::uses('AppModel', 'Model');
/**
 * ArthroSample Model
 *
 * @property Site $Site
 * @property Habitat $Habitat
 */
class ArthroSample extends AppModel {

	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'collection_date'  => array(
					'rule' => 'notEmpty')
	);
}