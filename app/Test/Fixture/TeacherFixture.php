<?php
class TeacherFixture extends CakeTestFixture {
	public $import = array(
			'table' => 'teachers', 
			'connection' => 'default');
	
	public $records = array(
			array('id' => '1','name' => 'Rohit Srikanta','email_address' => 'rohit@asu.edu','type' => 'A','school_id' => '1','password' => '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76'),			
			array('id' => '2','name' => 'Temp User','email_address' => 'temp@asu.edu','type' => 'P','school_id' => '2','password' => '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76'),
			array('id' => '3','name' => 'Temp User2','email_address' => 'temp2@asu.edu','type' => 'T','school_id' => '2','password' => '83d5e1e49bd5f0ebbf6c9ba40416057fac1b5d76'),
	);
}
?>