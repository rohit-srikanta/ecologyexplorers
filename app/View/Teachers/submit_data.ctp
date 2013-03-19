<html>

<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<body>
	<br>
	<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>

	<br>
	<br>
	<?php echo $this->Form->create('SubmitData', array('class'=>'form'));    
	echo $this->Form->input('protocol',array('div'=>'formfield','options' => $habitatTypeOptions));
	echo $this->Form->input('site',array('div'=>'formfield','options' => $siteIDOptions));
	echo $this->Form->input('class',array('div'=>'formfield','options' => $classIDOptions));
    echo $this->Form->end('Submit'); ?>
</body>
</html>
