<br>
<div>
		<?php echo $this->element('links'); ?>
</div>
<?php  $this->Html->addCrumb('Login', 'login');

echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<br>
<br><div class="text">
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));      
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('password',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->end('Login'); ?>
        
        <?php echo $this->Html->link('Forgot Password?',array('controller' => 'teachers', 'action' => 'forgotPassword'));?></div>
