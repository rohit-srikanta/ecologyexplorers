<div>
		<?php echo $this->element('links'); ?>
</div>


	<?php $this->Html->addCrumb('Submit Data', '/teachers/submitData');
	$this->Html->addCrumb('Habitat Check', '/habitats/habitatCheck');
	$this->Html->addCrumb('Vegetation Data', '/vegSamples/vegData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<?php echo $this->Form->create('VegSample',array('class'=>'form'));   ?>

<div class="formfield">
<legend>
	<b>Protocol : Vegetation</b>
</legend>
<br>

		<i><b>Remember while entering survey data:</b> </i>
	<p>The survey form cannot be submitted without data being entered</p>
	<p>There may not be duplicate entries (i.e. two rows with the same trap
		ID and Order)</p>
	<p>All entries in a row should be filled, no column can be left
		unfilled</p>


	<?php echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions,'disabled' => 'disabled'));
	echo $this->Form->input('Teacher',array('value' => $teacherName,'disabled' => 'disabled','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('site_name',array('disabled' => 'disabled','div'=>'formfield','options' => $siteOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('class_name',array('disabled' => 'disabled','div'=>'formfield','options' => $classOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('collection_date',array('div'=>'formfield'));
	echo $this->Form->input('observer',array('label' =>'Observer\'s Name', 'div'=>'formfield')); 
	echo $this->Form->input('tree_count',array('div'=>'formfield'));
	echo $this->Form->input('cactus_count',array('div'=>'formfield'));
	echo $this->Form->input('shrub_count',array('div'=>'formfield'));?>
	<br>
	<br>
	<p align="center">
		<b>Survey Data : </b>
	</p>
	<p align="center"><b>Please make sure that you enter all 3 values. </b></p>
	<table >
		<tr>
			<th>Vegetation Id</th>
			<th >Vegetation Type</th>
			<th>Species Name</th>
			<th>CBH (m)</th>
			<th>Height (m) </th>
			<th>Canopy Size (m2) </th>
			<th>Comments/Location</th>
		</tr>

		<?php for($i=0;$i<20;$i++) {?>

		<tr>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'veg_no',array('label' => '','size' => '10'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'plant_type',array('label' => '','empty' => 'Select','options' => array('Tree' =>'Tree', 'Cactus'=>'Cactus', 'Shrub'=>'Shrub'),))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'species_id',array('label' => '','empty' => 'Select','options' => $vegOptions))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'circumference',array('type' =>'number','label' => ''))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'height',array('label' => '','type' =>'number'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'canopy',array('label' => '','type' =>'number'))?></td>
			<td><?php echo $this->Form->input('VegSpecimen'.$i.'comments',array('label' => '','type'=>'textarea','rows' => 2, 'cols' => 35))?></td>
		</tr>

		<?php }?>
	</table>
</div>
<p><b>Please double check your entries before you click Submit.</b></p>
<?php echo $this->Form->end('Submit Vegetation Data',array('div'=>'submit')); ?>
