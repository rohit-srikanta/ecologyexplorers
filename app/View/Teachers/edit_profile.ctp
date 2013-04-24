<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<br>
<br>
<?php
$this->Html->addCrumb('Edit Profile', 'editProfile');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));?>
<br>
<h2>Edit Profile</h2><br>

        <?php echo $this->Form->create('Teacher', array('class'=>'form'));    
        echo $this->Form->input('name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
        echo $this->Form->input('password',array('value'=> '', 'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
        echo $this->Form->input('confirm_password',array('label'=>'Confirm Password','type'=>'password','value'=> '', 'div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
        echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions));
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Save'); ?>
 
</html>
