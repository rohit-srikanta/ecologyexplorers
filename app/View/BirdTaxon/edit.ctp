
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<p>Edit Bird Details</p>
<br>
        <?php echo $this->Form->create('BirdTaxon', array('class'=>'form'));     
        echo $this->Form->input('species_Id',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('tsn',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));  
        echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>