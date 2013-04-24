
<html>

<div>
	<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Arthropod Species Details	', 'modifyArthroTaxonData');
$this->Html->addCrumb('Add Arthropod Details	', 'addArthro');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br><br>

<p><b>Add Bird Details</b></p>
<br>
<?php echo $this->Form->create('BirdTaxon', array('class'=>'form'));     
echo $this->Form->input('species_id',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
echo $this->Form->input('common_name', array('size'=>25,'div'=>'formfield'));
echo $this->Form->end('Add'); ?>

</html>
