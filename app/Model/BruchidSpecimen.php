<?php
App::uses('AppModel', 'Model');
/**
 * BruchidSpecimen Model
 *
 */
class BruchidSpecimen extends AppModel {
	
	public function saveFields($fields)
	{
		if($this->saveAll($fields))
		{
			return true;
		}
	}

}
