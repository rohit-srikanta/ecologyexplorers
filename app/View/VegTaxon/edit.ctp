
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>
<p>
	<b>Edit Vegtation Details</b>
</p>
<br>
<?php echo $this->Form->create('VegTaxon', array('class'=>'form','div'=>'formfield'));     
echo $this->Form->input('species_id', array('type'=>'char','div'=>'formfield'));
echo $this->Form->input('type',array('div'=>'formfield','options' => array('Tree' =>'Tree', 'Cactus'=>'Cactus', 'Shrub'=>'Shrub')));
echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Save'); ?>

</html>
