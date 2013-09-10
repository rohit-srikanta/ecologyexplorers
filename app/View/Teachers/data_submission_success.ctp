<html>
<head>
</head>

<div>
	<?php echo $this->element('links'); ?>
</div>

	<?php $this->Html->addCrumb('Submit Data', '/teachers/submitData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br>
<body><center>
<h3>Thank you for submitting data!</h3>
<br><h3>Would you like to <?php echo $this->Html->link("submit",array('controller' => 'teachers', 'action' => 'submitData')); ?> more data ?</h3>
<h3>Go back to <?php echo $this->Html->link("Home Page",array('controller' => 'teachers', 'action' => 'index')); ?></h3></center>
</body>
</html>
