
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>
<p><b>Add Bird Details</b></p>
<br>
<?php echo $this->Form->create('BirdTaxon', array('class'=>'form'));     
echo $this->Form->input('species_id',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
echo $this->Form->end('Add'); ?>

</html>
