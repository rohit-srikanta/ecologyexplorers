
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Vegetation Species Details	', 'modifyVegTaxonData');
$this->Html->addCrumb('Add Vegetation Details	', 'addVeg');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
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
