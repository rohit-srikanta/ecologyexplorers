
<div>
		<?php echo $this->element('links'); ?>
</div>

<?php
$this->Html->addCrumb('Create Class', 'createClass');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br>
<h2>Create Class</h2>
        <?php echo $this->Form->create('TeachersClass', array('class'=>'form'));    
         echo $this->Form->input('class_name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
         echo $this->Form->input('grade',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
         echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions));
         echo $this->Form->end('Create Class'); ?>
   
