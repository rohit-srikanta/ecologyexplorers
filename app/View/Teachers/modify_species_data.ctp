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
<br>
<div class="text">
	
	<?php echo $this->Html->link('Modify Arthropod Species Details', array('controller' => 'arthrotaxon', 'action' => 'modifyArthroTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Bird Species Details', array('controller' => 'birdtaxon', 'action' => 'modifyBirdTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Vegetation Details', array('controller' => 'vegtaxon', 'action' => 'modifyVegTaxonData'));?>
	<br>
	<br>
	<?php echo $this->Html->link('Modify Cloud Cover Details', array('controller' => 'cloudCover', 'action' => 'modifyCloudCover'));?>
	<br>
	<br>
</html>