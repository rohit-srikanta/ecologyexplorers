<?php
/**
 * SiteFixture
 *
 */
class SiteFixture extends CakeTestFixture {

public $import = array(
			'table' => 'sites', 
			'connection' => 'default');


public $records = array(
		array('id' => '1','site_id' => 'football fields','site_name' => 'football fields','school_id' => '1','address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309','zipcode' => '85287','city' => 'Tempe'),
		array('id' => '2','site_id' => 'baseball fields','site_name' => 'baseball fields','school_id' => '1','address' => 'Brickyard 6th Floor,USC,P.O. Box 879555','zipcode' => '85287','city' => 'Tempe'),
		array('id' => '3','site_id' => 'soccer fields','site_name' => 'soccer fields','school_id' => '2','address' => 'Brickyard 6th Floor,Syracuse University,P.O. Box 777309','zipcode' => '77287','city' => 'Syracuse'),
);
}
