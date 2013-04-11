<html>
<head>
</head>

<div>
	<?php echo $this->element('links'); ?>
</div>
<?php echo $this->Form->create('BruchidSample',array('class'=>'form'));   ?>

<div class="formfield">
	<legend>
		<b>Protocol : Beetles</b>
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
	echo $this->Form->input('location',array('label'=> 'Sampling Location / Address ','div'=>'formfield','type'=>'textarea','rows' => 3, 'cols' => 35,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('collection_date',array('label'=> 'Collection Date','div'=>'formfield'));
	echo $this->Form->input('observer',array('label' =>'Observer\'s Name', 'div'=>'formfield'));
	echo $this->Form->input('tree_type',array('div'=>'formfield','empty' => 'Select','options' => $treeOptions));
	echo $this->Form->input('site_type',array('label'=>'Trees Habitat / Site Type ','div'=>'formfield','empty' => 'Select','options' => $habOptions))?>

	
	<br> <br>
	<p align="center">
		<b>Survey Data : </b>
	</p>
	<p align="center">
		<b>Please make sure that you enter all the values. </b>
	</p>
	<table>
		<tr>
			<th>Tree Number</th>
			<th>Pod Number</th>
			<th>Number of Holes</th>
			<th>Number of Seeds</th>
		</tr>

		<?php for($i=0;$i<10;$i++) {?>

		<tr>
			<td><?php echo $this->Form->input('BruchidSpecimen'.$i.'tree_no',array('label' => '','size' => '10'))?>
			</td>
			<td><?php echo $this->Form->input('BruchidSpecimen'.$i.'pod_no',array('label' => '','size' => '10'))?>
			</td>
			<td><?php echo $this->Form->input('BruchidSpecimen'.$i.'hole_count',array('type' => 'number','label' => ''))?>
			</td>
			<td><?php echo $this->Form->input('BruchidSpecimen'.$i.'seed_count',array('type' => 'number','label' => ''))?>
			</td>

		</tr>

		<?php }?>
	</table>
</div>

<p>
	<b>Please double check your entries before you click Submit.</b>
</p>
<?php echo $this->Form->end('Submit Beetle Data',array('div'=>'submit')); ?>
</html>
