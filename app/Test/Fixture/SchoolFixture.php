<?php
class SchoolFixture extends CakeTestFixture {
	public $import = array(
			'table' => 'schools', 
			'connection' => 'default');
	
	
	
	public $records = array(
			array('id' => '1','school_id' => 'ASU','school_name' => 'Arizona State University','address' => 'Brickyard 6th Floor,Arizona State University,P.O. Box 879309','zipcode' => '85287','city' => 'Tempe'),
			array('id' => '2','school_id' => 'USC','school_name' => 'University Of Southern California','address' => 'Brickyard 6th Floor,USC,P.O. Box 879555','zipcode' => '879555','city' => 'Los Angeles'),
			array('id' => '3','school_id' => 'SYR','school_name' => 'Syracuse University','address' => 'Brickyard 6th Floor,Syracuse University,P.O. Box 777309','zipcode' => '77287','city' => 'Syracuse'),
			);
}
?>