
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<p><b>Edit Bird Details</b></p>
<br>
        <?php echo $this->Form->create('BirdTaxon', array('class'=>'form'));     
        echo $this->Form->input('species_id',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('tsn',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
        echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>