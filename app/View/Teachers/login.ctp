<html>
<br>
<div>
		<?php echo $this->element('links'); ?>
</div>
<br><div class="text">
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));      
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('password',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->end('Login'); ?>
        
        <?php echo $this->Html->link('Forgot Password?',array('controller' => 'teachers', 'action' => 'forgotPassword'));?></div>
 </html>