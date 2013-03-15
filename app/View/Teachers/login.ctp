<html>
<br>
    <?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
<br>
<br>
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));      
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('password',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->end('Login'); ?>
 </html>