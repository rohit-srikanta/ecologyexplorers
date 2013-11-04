
<br>
	<div>
		<?php echo $this->element('links'); ?>
	</div>
<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));?>

	<?php echo $this->Form->create('DataSampleDate', array('class'=>'form'));    
	echo $this->Form->input('protocol',array('label' => 'Protocol Data to be modified','div'=>'formfield','options' => $habitatTypeOptions));
	echo $this->Form->input('start_date',array('type'=>'date','orderYear' => 'asc','selected' => '2013-01-01 00:00:00','div'=>'formfield','dateFormat' => 'DMY','minYear' => date('Y') - 0,'maxYear' => date('Y') - 25 ));
	echo $this->Form->input('end_date',array('type'=>'date','div'=>'formfield','dateFormat' => 'DMY', 'minYear' => date('Y') - 0,'maxYear' => date('Y') - 25 ));
	?>
	<br>
	<?php  echo $this->Form->end('Submit'); ?>

