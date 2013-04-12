<html>

<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<body>
	<div>
		<?php echo $this->element('links'); ?>
	</div>
	<?php echo $this->Form->create('SubmitData', array('class'=>'form'));    
	echo $this->Form->input('protocol',array('div'=>'formfield','options' => $habitatTypeOptions));
	echo $this->Form->input('site',array('div'=>'formfield','options' => $siteIDOptions));
	echo $this->Form->input('class',array('div'=>'formfield','options' => $classIDOptions));
    echo $this->Form->end('Submit'); ?>
	<p>
		<?php echo $this->Html->link('Create Site',  array('controller' => 'sites', 'action' => 'createSite')); ?>
		<br> <br>
		<?php echo $this->Html->link('Create Class',  array('controller' => 'teachersclass', 'action' => 'createClass')); ?>

	</p>
</body>
</html>
