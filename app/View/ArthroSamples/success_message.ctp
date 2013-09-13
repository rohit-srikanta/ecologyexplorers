<div>
	<?php echo $this->element('links'); ?>
</div>

	<?php $this->Html->addCrumb('Submit Data', '/teachers/submitData');
  echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
  echo " > Data Submission ";
  ?>
<h2> Thank you for submitting data! </h2>

<div>
  <h3>
    Would you like to <?php echo $this->Html->link('submit more data', array('controller' => 'teachers', 'action' => 'submitData')) ?>?
  </h3>


</div>

