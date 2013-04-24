
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
<div><p>
	<b>Add Arthropod Details</b>
</p></div>
<?php echo $this->Form->create('ArthroTaxon', array('class'=>'form'));
echo $this->Form->input('taxon',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
echo $this->Form->input('taxon_name', array('size'=>25,'div'=>'formfield'));
echo $this->Form->end('Add'); ?>

</html>
