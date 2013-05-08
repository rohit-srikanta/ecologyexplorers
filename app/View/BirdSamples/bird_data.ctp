<div>
	<?php echo $this->element('links'); ?>
</div>


	<?php $this->Html->addCrumb('Submit Data', '/teachers/submitData');
	$this->Html->addCrumb('Habitat Check', '/habitats/habitatCheck');
	$this->Html->addCrumb('Birds Data', 'birdSamples/birdData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>


<?php echo $this->Form->create('BirdSample',array('class'=>'form'));   ?>

<div class="formfield">
<legend >
	<b>Protocol : Birds</b>
</legend>
<br>
	<p>
		<i><b>Remember while entering survey data:</b> </i>
	</p>

	<p>The survey form cannot be submitted without data being entered</p>
	<p>There may not be duplicate entries (i.e. two rows with the same
		species name)</p>
	<p>All entries in a row should be filled, no column can be left
		unfilled</p>


	<?php echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions,'disabled' => 'disabled'));
	echo $this->Form->input('Teacher',array('value' => $teacherName,'disabled' => 'disabled','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('site_name',array('disabled' => 'disabled','div'=>'formfield','options' => $siteOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('class_name',array('disabled' => 'disabled','div'=>'formfield','options' => $classOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('collection_date',array('label'=> 'Date of Entry','div'=>'formfield'));
	echo $this->Form->input('observer',array('label' =>'Observer\'s Name', 'div'=>'formfield'));
	echo $this->Form->input('comments',array('div'=>'formfield','type'=>'textarea','rows' => 3, 'cols' => 35));  ?>

	<p>
		<b>Weather Report : </b>

		<?php echo $this->Form->input('cloud_cover_id',array('div'=>'formfield','empty' => 'Select','options' => $cloudOptions,'error' => array('wrap' => 'div','class' => 'formerror'))); 
		echo $this->Form->input('air_temp',array('label'=>'Temperature', 'type' => 'number','interval' => 5,'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
		echo $this->Form->input('temp_units',array('label'=>'Temperature Unit', 'options' => array('1' =>'Celsius', '2'=>'Farenheit'),'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
		echo $this->Form->input('time_start',array('default' => $this->Time->format('H:i:s', date('H:i:s'), null, 'PDT'),'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
		echo $this->Form->input('time_end',array('default' => $this->Time->format('H:i:s', date('H:i:s'), null, 'PDT'),'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
		?>
	</p>
	<br> <br>
	<p align="center">
		<b>Survey Data : </b>
	</p>
	<p align="center">
		<b>Please make sure that you enter all the values. </b>
	</p>
	<table>
		<tr>
			<th>Species Name</th>
			<th>Number of Birds</th>
					</tr>

		<?php for($i=0;$i<20;$i++) {?>

		<tr>
			<td><?php echo $this->Form->input('BirdSpecimen'.$i.'taxon',array('label' => '','empty' => 'Select','options' => $birdOptions))?>
			</td>
			<td><?php echo $this->Form->input('BirdSpecimen'.$i.'frequency',array('type' => 'number','label' => ''))?>
			</td>
			
		</tr>

		<?php }?>
	</table>
</div>

<p><b>Please double check your entries before you click Submit.</b></p>
<?php echo $this->Form->end('Submit Bird Data',array('div'=>'submit')); ?>
