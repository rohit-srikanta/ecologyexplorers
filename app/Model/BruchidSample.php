<?php
App::uses('AppModel', 'Model');
/**
 * BruchidSample Model
 *
*/
class BruchidSample extends AppModel {

	public $validate = array(
			'observer'  => array(
					'rule' => 'notEmpty'),
			'location'  => array(
					'rule' => 'notEmpty')
	);

	public function savingthedata($fields)
	{
		$fields['BruchidSample']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields['BruchidSample']))
		{
			for($i=0;$i<10;$i++)
			{
				$str1 = "BruchidSpecimen".$i."tree_no";
				$str2 = "BruchidSpecimen".$i."pod_no";
				$str3 = "BruchidSpecimen".$i."hole_count";
				$str4 = "BruchidSpecimen".$i."seed_count";

				if(null != $fields['BruchidSample'][$str1] && null != $fields['BruchidSample'][$str2] && null != $fields['BruchidSample'][$str3] && null != $fields['BruchidSample'][$str4])
				{
					$newRow[$i]['tree_no'] = $fields['BruchidSample'][$str1];
					$newRow[$i]['pod_no'] = $fields['BruchidSample'][$str2];
					$newRow[$i]['hole_count'] = $fields['BruchidSample'][$str3];
					$newRow[$i]['seed_count'] = $fields['BruchidSample'][$str4];
					$newRow[$i]['sample_id'] = $this->getInsertID();
				}
			}

			if(ClassRegistry::init('BruchidSpecimen')->saveFields($newRow))
			{
				return true;
			}
		}
		return false;
	}

}
