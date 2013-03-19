<html>
<head>
</head>

<br>
<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
<br>

<?php echo $this->Form->create('ArthroSamples',array('class'=>'form'));   ?>

<legend class="formfield">
	<b>Protocol : Arthropods</b>
</legend>
<br>

<div class="formfield">
	<p>On this page you will be entering the arthropod data you collected
		from your trap line. If any of the information on the top of the page
		is incorrect, go back and change it before entering your arthropod
		data. Be sure to check all information before submitting the data.</p>
	<p>
		<i><b>Remember while entering survey data:</b> </i>
	</p>
	<p>The survey form cannot be submitted without data being entered</p>
	<p>There may not be duplicate entries (i.e. two rows with the same trap
		ID and Order)</p>
	<p>All entries in a row should be filled, no column can be left
		unfilled</p>


	<?php echo $this->Form->input('school',array('div'=>'formfield_school','options' => $schooloptions,'disabled' => 'disabled'));
	echo $this->Form->input('Teacher',array('value' => $teacherName,'disabled' => 'disabled','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('site_name',array('disabled' => 'disabled','div'=>'formfield','options' => $siteOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('class_name',array('disabled' => 'disabled','div'=>'formfield','options' => $classOptions,'error' => array('wrap' => 'div','class' => 'formerror')));
	echo $this->Form->input('collection_date',array('div'=>'formfield'));
	echo $this->Form->input('observer',array('label' =>'Name of person identifying the sample', 'div'=>'formfield'));
echo $this->Form->input('comments',array('div'=>'formfield'));  ?>

	<p>
		<b><u>Survey Data :</u> </b>
	</p>

	<table>
		<tr>
			<th>Trap ID</th>
			<th>Arthropod Order</th>
			<th>Tally Number</th>
		</tr>

		<?php for($i=0;$i<5;$i++) {?>

		<tr>
			<td><?php echo $this->Form->input('ArthroSamples.trap_id',array('label' => ''))?></td>
			<td><?php echo $this->Form->input('ArthroSamples.taxon',array('label' => ''))?></td>
			<td><?php echo $this->Form->input('ArthroSamples.frequency',array('label' => ''))?></td>
		</tr>
	
	<?php }?>
</table>
	</div>

<br>
<?php echo $this->Form->end('Submit Arthropod Data',array('div'=>'submit')); ?>

</html>
