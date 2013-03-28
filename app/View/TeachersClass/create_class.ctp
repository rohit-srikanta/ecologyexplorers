<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<br>
        <?php echo $this->Form->create('TeachersClass', array('class'=>'form'));    
         echo $this->Form->input('class_name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
         echo $this->Form->input('grade',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
         echo $this->Form->input('school',array('div'=>'formfield','options' => $schooloptions));
         echo $this->Form->end('Create Class'); ?>
   
</html>
