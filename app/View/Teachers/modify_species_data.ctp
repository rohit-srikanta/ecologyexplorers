<html>
<br>
<div>
	<?php echo $this->element('links'); ?>
</div>
<?php $this->Html->addCrumb('Modify Ecology Explorers Data', 'modifySpeciesData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br><br>
<br><div class="text">
<h2>Modify Species Data</h2><br>

	
	<?php echo $this->Html->link('Modify Arthropod Species Details', array('controller' => 'ArthroTaxon', 'action' => 'modifyArthroTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Bird Species Details', array('controller' => 'BirdTaxon', 'action' => 'modifyBirdTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Vegetation Details', array('controller' => 'VegTaxon', 'action' => 'modifyVegTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Cloud Cover Details', array('controller' => 'CloudCover', 'action' => 'modifyCloudCover'));?>
	<br>
	<br>
</div>
</html>