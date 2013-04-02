<?php
App::uses('AppModel', 'Model');
/**
 * VegSpecimen Model
 *
 */
class VegSpecimen extends AppModel {
	
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
