
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>
<p>
	<b>Add Vegtation Details</b>
</p>
<br>
<?php echo $this->Form->create('VegTaxon', array('class'=>'form','div'=>'formfield'));     
echo $this->Form->input('species_id', array('type'=>'char','div'=>'formfield'));
echo $this->Form->input('type',array('div'=>'formfield','empty' => 'Select','options' => array('Tree' =>'Tree', 'Cactus'=>'Cactus', 'Shrub'=>'Shrub')));
echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
echo $this->Form->end('Add'); ?>

</html>
