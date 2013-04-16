
<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<p><b>Edit Arthropod Details</b></p>
<br>
        <?php echo $this->Form->create('ArthroTaxon', array('class'=>'form'));     
        echo $this->Form->input('taxon',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
        echo $this->Form->input('taxon_name', array('size'=>25,'div'=>'formfield'));
        echo $this->Form->input('id', array('type' => 'hidden')); 
        echo $this->Form->end('Save'); ?>
   
</html>