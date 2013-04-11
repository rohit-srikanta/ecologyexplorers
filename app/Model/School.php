<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 * @property School $School
*/
class School extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'school_Id' => array(
					'rule' => array('between', 3, 3),
					'message' => 'School ID must be of 3 characters'),
			'school_name'  => array(
					'rule' => 'notEmpty'),
			'address'  => array(
					'rule' => 'notEmpty'),
			'city'  => array(
					'rule' => 'notEmpty'),
			'zipcode' => array(
					'rule' => array('postal', null, 'us'),
					'message' => 'Please enter a valid zipcode')
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	*/

	public $recursive = -1;

	public $actsAs = array('Containable');

	public $hasMany = array(
			'Habitat' => array(
					'className' => 'Habitat',
			),
			'Teacher' => array(
					'className' => 'Teacher',
			),
			'TeachersClass' => array(
					'className' => 'TeachersClass',
			),
			'Site' => array(
					'className' => 'Site',
			),
			'TeachersClass' => array(
					'className' => 'TeachersClass',
			)
	);

	//This method is called from the teachers controller to load the schools during user registration.
	public function loadSchools()
	{
		$school = $this->find('list', array(
				'fields' => array(
						'School.Id',
						'School.school_Name')));

		return $school;
	}

	public function schoolOptions()
	{
		$schools = $this->loadSchools();

		$i = 0;
		foreach ($schools as $k)
		{
			$schooloptions[$i]['name'] = ($k);
			$schooloptions[$i]['value'] = array_search($k,$schools);
			$i++;
		}
		return $schooloptions;
	}

	public function schoolWithID($schoolID)
	{
		if($schoolID == null)
			return false;

		$temp['id'] = $schoolID;
		if($this->hasAny($temp))
		{
			$conditions = array('School.id' => $schoolID);
			$temp = $this->find('first', array('conditions' => $conditions,'fields' => array(
					'School.id',
					'School.school_name')));

			$schooloptions[0]['value'] = $temp['School']['id'];
			$schooloptions[0]['name'] = $temp['School']['school_name'];
			return $schooloptions;
		}
		return false;
	}

	//This method is called from the School Controller to create new schools
	public function createSchool($fields)
	{
		$this->create();
		$fields['School']['school_id'] = strtoupper($fields['School']['school_Id']);
		$fields['School']['date_entered'] = date('Y-m-d H:i:s');

		if($this->save($fields))
		{
			return true;
		}
		else
			return false;
	}

	//This method is used to validate if the school id given already exists
	public function checkSchoolIdPresent($fields = null)
	{
		if($this->findBySchoolId($fields) != null)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function retrieveData($dataConditions)
	{
		$this->recursive = 2;
		$protocol =$dataConditions['protocol'];
		$startDate=$dataConditions['start_date'];
		$endDate=$dataConditions['end_date'];
		$schoolID=$dataConditions['school_id'];

		$conditionsSchool = array('School.id' => $schoolID);
		$conditionsProtocol = array('Habitat.type' => $protocol);

		if($protocol == 'BI')
		{

			$conditionsDate = array('BirdSample.collection_date between ? and ?' => array($startDate, $endDate));
				
			$fieldsHabitat= array('Habitat.type','Habitat.recording_date','Habitat.radius','Habitat.percent_observed','Habitat.tree_canopy','Habitat.shrubcover','Habitat.gravel_soil','Habitat.lawn','Habitat.paved_building','Habitat.other');
			$fieldsSchool = array('School.school_name','School.city','School.zipcode');
			$fieldsBirdSample = array('BirdSample.time_start','BirdSample.time_end','BirdSample.collection_date','BirdSample.air_temp','BirdSample.comments');
			$fieldsTeachersClass = array('TeachersClass.class_name');
			$fieldsBirdSpecimen = array('BirdSpecimen.frequency');
			$fieldsBirdTaxon = array('BirdTaxon.common_name');
			$fieldsTeacher = array('Teacher.name');
			$fieldsSite = array('Site.location','Site.site_name');

			$school = $this->find('all',array(
					'conditions' => $conditionsSchool,'contain'=>array(
							'Habitat'=>array(
									'conditions' => $conditionsProtocol,'fields' => $fieldsHabitat,'BirdSample'=>array(
											'conditions'=> $conditionsDate,'fields' => $fieldsBirdSample,'CloudCover','Site'=>array(
													'fields' => $fieldsSite),'TeachersClass'=>array(
															'Teacher'=>array('fields' => $fieldsTeacher),'fields' => $fieldsTeachersClass),'BirdSpecimen'=>array(
																	'BirdTaxon'=>array('fields' => $fieldsBirdTaxon),'fields' => $fieldsBirdSpecimen)
									)
							),
					),
					'fields' => $fieldsSchool,
			));

			$i=0;
			$data ='';
			foreach ($school[0]['Habitat'] as $habitat)
			{
				foreach ($habitat['BirdSample'] as $birdSamples)
				{
					foreach ($birdSamples['BirdSpecimen'] as $birdSpecimen)
					{
						$data[$i]['school_name'] = $school[0]['School']['school_name'];
						$data[$i]['city'] = $school[0]['School']['city'];
						$data[$i]['zipcode'] = $school[0]['School']['zipcode'];
						$data[$i]['recording_date'] = $habitat['recording_date'];
						$data[$i]['radius'] = $habitat['radius'];
						$data[$i]['percent_observed'] = $habitat['percent_observed'];
						$data[$i]['tree_canopy'] = $habitat['tree_canopy'];
						$data[$i]['shrubcover'] = $habitat['shrubcover'];
						$data[$i]['gravel_soil'] = $habitat['gravel_soil'];
						$data[$i]['lawn'] = $habitat['lawn'];
						$data[$i]['paved_building'] = $habitat['paved_building'];
						$data[$i]['other'] = $habitat['other'];
						$data[$i]['time_start'] = $birdSamples['time_start'];
						$data[$i]['time_end'] = $birdSamples['time_end'];
						$data[$i]['collection_date'] = $birdSamples['collection_date'];
						$data[$i]['air_temp'] = $birdSamples['air_temp'];
						$data[$i]['comments'] = $birdSamples['comments'];
						$data[$i]['site_name'] = $birdSamples['Site']['site_name'];
						$data[$i]['location'] = $birdSamples['Site']['location'];
						$data[$i]['class_name'] = $birdSamples['TeachersClass']['class_name'];
						$data[$i]['name'] = $birdSamples['TeachersClass']['Teacher']['name'];
						$data[$i]['cloud_cover'] = $birdSamples['CloudCover']['cloud_cover_name'];
						$data[$i]['frequency'] = $birdSpecimen['frequency'];
						$data[$i]['common_name'] = $birdSpecimen['BirdTaxon']['common_name'];

						$i++;
					}
				}
			}
			return $data;
		}
		else if($protocol == 'AR')
		{
			$conditionsDate = array('ArthroSample.collection_date between ? and ?' => array($startDate, $endDate));
				
			$fieldsHabitat= array('Habitat.type','Habitat.recording_date','Habitat.radius','Habitat.percent_observed','Habitat.tree_canopy','Habitat.shrubcover','Habitat.gravel_soil','Habitat.lawn','Habitat.paved_building','Habitat.other');
			$fieldsSchool = array('School.school_name','School.city','School.zipcode');
			$fieldsArthroSample = array('ArthroSample.collection_date','ArthroSample.comments');
			$fieldsTeachersClass = array('TeachersClass.class_name');
			$fieldsArthroSpecimen = array('ArthroSpecimen.frequency');
			$fieldsArthroTaxon = array('ArthroTaxon.taxon_name');
			$fieldsTeacher = array('Teacher.name');
			$fieldsSite = array('Site.location','Site.site_name');
				
			$school = $this->find('all',array(
					'conditions' => $conditionsSchool,'contain'=>array(
							'Habitat'=>array(
									'conditions' => $conditionsProtocol,'fields' => $fieldsHabitat,'ArthroSample'=>array(
											'conditions'=> $conditionsDate,'fields' => $fieldsArthroSample,'Site'=>array(
													'fields' => $fieldsSite),'TeachersClass'=>array(
															'Teacher'=>array('fields' => $fieldsTeacher),'fields' => $fieldsTeachersClass),'ArthroSpecimen'=>array(
																	'ArthroTaxon'=>array('fields' => $fieldsArthroTaxon),'fields' => $fieldsArthroSpecimen)
									)
							),
					),
					'fields' => $fieldsSchool,
			));
				
			//pr($school);
			$i=0;
			$data ='';
			foreach ($school[0]['Habitat'] as $habitat)
			{
				foreach ($habitat['ArthroSample'] as $arthroSamples)
				{
					foreach ($arthroSamples['ArthroSpecimen'] as $arthroSpecimen)
					{
						$data[$i]['school_name'] = $school[0]['School']['school_name'];
						$data[$i]['city'] = $school[0]['School']['city'];
						$data[$i]['zipcode'] = $school[0]['School']['zipcode'];
						$data[$i]['recording_date'] = $habitat['recording_date'];
						$data[$i]['tree_canopy'] = $habitat['tree_canopy'];
						$data[$i]['shrubcover'] = $habitat['shrubcover'];
						$data[$i]['gravel_soil'] = $habitat['gravel_soil'];
						$data[$i]['lawn'] = $habitat['lawn'];
						$data[$i]['paved_building'] = $habitat['paved_building'];
						$data[$i]['other'] = $habitat['other'];
						$data[$i]['collection_date'] = $arthroSamples['collection_date'];
						$data[$i]['comments'] = $arthroSamples['comments'];
						$data[$i]['site_name'] = $arthroSamples['Site']['site_name'];
						$data[$i]['location'] = $arthroSamples['Site']['location'];
						$data[$i]['class_name'] = $arthroSamples['TeachersClass']['class_name'];
						$data[$i]['name'] = $arthroSamples['TeachersClass']['Teacher']['name'];
						$data[$i]['frequency'] = $arthroSpecimen['frequency'];
						$data[$i]['taxon_name'] = $arthroSpecimen['ArthroTaxon']['taxon_name'];
							
						$i++;
					}
				}
			}
			//pr($data);
			return $data;

		}
		else if($protocol == 'VE')
		{
			$conditionsDate = array('VegSample.collection_date between ? and ?' => array($startDate, $endDate));

			$fieldsHabitat= array('Habitat.type','Habitat.recording_date','Habitat.area','Habitat.tree_canopy','Habitat.shrubcover','Habitat.gravel_soil','Habitat.lawn','Habitat.paved_building','Habitat.other');
			$fieldsSchool = array('School.school_name','School.city','School.zipcode');
			$fieldsVegSample = array('VegSample.collection_date','VegSample.tree_count','VegSample.shrub_count','VegSample.cactus_count',);
			$fieldsTeachersClass = array('TeachersClass.class_name');
			$fieldsVegSpecimen = array('VegSpecimen.veg_no','VegSpecimen.circumference','VegSpecimen.height','VegSpecimen.canopy','VegSpecimen.comments');
			$fieldsVegTaxon = array('VegTaxon.common_name');
			$fieldsTeacher = array('Teacher.name');
			$fieldsSite = array('Site.location','Site.site_name');

			$school = $this->find('all',array(
					'conditions' => $conditionsSchool,'contain'=>array(
							'Habitat'=>array(
									'conditions' => $conditionsProtocol,'fields' => $fieldsHabitat,'VegSample'=>array(
											'conditions'=> $conditionsDate,'fields' => $fieldsVegSample,'Site'=>array(
													'fields' => $fieldsSite),'TeachersClass'=>array(
															'Teacher'=>array('fields' => $fieldsTeacher),'fields' => $fieldsTeachersClass),'VegSpecimen'=>array(
																	'VegTaxon'=>array('fields' => $fieldsVegTaxon),'fields' => $fieldsVegSpecimen)
									)
							),
					),
					'fields' => $fieldsSchool,
			));

			//pr($school);
			$i=0;
			$data ='';
			foreach ($school[0]['Habitat'] as $habitat)
			{
				foreach ($habitat['VegSample'] as $vegSamples)
				{
					foreach ($vegSamples['VegSpecimen'] as $vegSpecimen)
					{
						$data[$i]['school_name'] = $school[0]['School']['school_name'];
						$data[$i]['city'] = $school[0]['School']['city'];
						$data[$i]['zipcode'] = $school[0]['School']['zipcode'];
						$data[$i]['recording_date'] = $habitat['recording_date'];
						$data[$i]['tree_canopy'] = $habitat['tree_canopy'];
						$data[$i]['shrubcover'] = $habitat['shrubcover'];
						$data[$i]['gravel_soil'] = $habitat['gravel_soil'];
						$data[$i]['lawn'] = $habitat['lawn'];
						$data[$i]['paved_building'] = $habitat['paved_building'];
						$data[$i]['other'] = $habitat['other'];
						$data[$i]['collection_date'] = $vegSamples['collection_date'];
						$data[$i]['site_name'] = $vegSamples['Site']['site_name'];
						$data[$i]['location'] = $vegSamples['Site']['location'];
						$data[$i]['class_name'] = $vegSamples['TeachersClass']['class_name'];
						$data[$i]['name'] = $vegSamples['TeachersClass']['Teacher']['name'];
						$data[$i]['veg_no'] = $vegSpecimen['veg_no'];
						$data[$i]['circumference'] = $vegSpecimen['circumference'];
						$data[$i]['height'] = $vegSpecimen['height'];
						$data[$i]['canopy'] = $vegSpecimen['canopy'];
						$data[$i]['comments'] = $vegSpecimen['comments'];
						$data[$i]['common_name'] = $vegSpecimen['VegTaxon']['common_name'];
							
						$i++;
					}
				}
			}
			//pr($data);
			return $data;
		}
		else if($protocol == 'BR')
		{
			$conditionsDate = array('BruchidSample.collection_date between ? and ?' => array($startDate, $endDate));

			$fieldsSchool = array('School.school_name','School.city','School.zipcode');
			$fieldsBruchidSample = array('BruchidSample.collection_date','BruchidSample.tree_type','BruchidSample.site_type',);
			$fieldsTeachersClass = array('TeachersClass.class_name');
			$fieldsBruchidSpecimen = array('BruchidSpecimen.tree_no','BruchidSpecimen.pod_no','BruchidSpecimen.hole_count','BruchidSpecimen.seed_count');
			$fieldsTeacher = array('Teacher.name');
			$fieldsSite = array('Site.location','Site.site_name');

			$school = $this->find('all',array(
					'conditions' => $conditionsSchool,'contain'=>array(
							'Site'=>array(
									'fields' => $fieldsSite,'BruchidSample'=>array(
											'conditions'=> $conditionsDate,'fields' => $fieldsBruchidSample,'TeachersClass'=>array(
													'Teacher'=>array('fields' => $fieldsTeacher),'fields' => $fieldsTeachersClass),'BruchidSpecimen'=>array(
															'fields' => $fieldsBruchidSpecimen)
									)
							),
					),
					'fields' => $fieldsSchool,
			));

			//pr($school);
			$i=0;
			$data ='';
			foreach ($school[0]['Site'] as $site)
			{
				foreach ($site['BruchidSample'] as $bruchidSamples)
				{
					foreach ($bruchidSamples['BruchidSpecimen'] as $bruchidSpecimen)
					{
						$data[$i]['school_name'] = $school[0]['School']['school_name'];
						$data[$i]['city'] = $school[0]['School']['city'];
						$data[$i]['zipcode'] = $school[0]['School']['zipcode'];
						$data[$i]['collection_date'] = $bruchidSamples['collection_date'];
						$data[$i]['site_type'] = $bruchidSamples['site_type'];
						$data[$i]['tree_type'] = $bruchidSamples['tree_type'];
						$data[$i]['site_name'] = $site['site_name'];
						$data[$i]['location'] = $site['location'];
						$data[$i]['class_name'] = $bruchidSamples['TeachersClass']['class_name'];
						$data[$i]['name'] = $bruchidSamples['TeachersClass']['Teacher']['name'];
						$data[$i]['tree_no'] = $bruchidSpecimen['tree_no'];
						$data[$i]['pod_no'] = $bruchidSpecimen['pod_no'];
						$data[$i]['hole_count'] = $bruchidSpecimen['hole_count'];
						$data[$i]['seed_count'] = $bruchidSpecimen['seed_count'];
							
						$i++;
					}
				}
			}
			//pr($data);
			return $data;
		}
	}
}
