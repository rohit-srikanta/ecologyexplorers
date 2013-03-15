<html>

<br>
    <?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>
    <br><br>
    <?php echo $this->Html->link('Back',array('controller' => 'teachers', 'action' => 'modifyUser')); ?>
<br>
<br>
        <?php echo $this->Form->create('Teacher', array('class'=>'form'));     
        echo $this->Form->input('name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
        echo $this->Form->input('type', array('div'=>'formfield','options' => $userTypeOptions));
        echo $this->Form->input('school',array('div'=>'formfield','options' => $schooloptions));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>
