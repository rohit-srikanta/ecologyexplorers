
<br>
	<div>
		<?php echo $this->element('links'); ?>
	</div>
<?php $this->Html->addCrumb('Download Data', 'downloadData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));?>

	<?php echo $this->Form->create('retrieveData', array('class'=>'form'));    
	echo $this->Form->input('protocol',array('label'=>'Choose the dataset you would like to work with  :','div'=>'formfield','options' => $habitatTypeOptions));
	echo "<br/>";
	echo $this->Form->input('start_date',array('type'=>'date','orderYear' => 'asc','selected' => '1995-01-01 00:00:00','div'=>'formfield','dateFormat' => 'DMY','minYear' => date('Y') - 0,'maxYear' => date('Y') - 25 ));
	echo $this->Form->input('end_date',array('type'=>'date','div'=>'formfield','dateFormat' => 'DMY', 'minYear' => date('Y') - 0,'maxYear' => date('Y') - 25 ));
	echo $this->Form->input('school_id',array('label'=>'School Name  :','div'=>'formfield','options' => $schooloptions));?>
	<br>

	<?php  echo $this->Form->end('Submit'); ?>

