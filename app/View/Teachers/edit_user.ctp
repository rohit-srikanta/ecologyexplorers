<html>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php
$this->Html->addCrumb('Modify Users', 'modifyUser');
$this->Html->addCrumb('Edit User', 'editUser');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));?>



<br>
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));     
        echo $this->Form->input('name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
        echo $this->Form->input('type', array('div'=>'formfield','options' => $userTypeOptions));
        echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>
