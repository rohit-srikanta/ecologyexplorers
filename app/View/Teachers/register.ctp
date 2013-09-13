<h2>Welcome to the Ecology Explorers Data Center!</h2>
<br>
<br>
<div>
		<?php echo $this->element('links'); ?>
</div>

<?php  $this->Html->addCrumb('Register', 'register');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<br>
<h2>Register</h2><br>

<br>
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));    
        echo $this->Form->input('name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('password',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('school_id',array('div'=>'formfield','options' => $schooloptions));
        echo $this->Form->end('Register'); ?>
