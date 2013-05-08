<br>
<div>
	<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Arthropod Species Details	', 'modifyArthroTaxonData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Arthropod Taxon</b>
</h2>
<br>
<br><div class="text">

<?php echo $this->Html->link('Add Arthropod Details',array('controller' => 'ArthroTaxon', 'action' => 'addArthro'));
?>
<br>
<br>
<table>
	<?php echo $this->Form->create('ArthroTaxon');?>
	<tr>

		<th>ID</th>
		<th>Species ID</th>
		<th>Common Name</th>
		<th>Action</th>
	</tr>

	<?php foreach ($ArthroTaxon as $bird):?>
	<tr>
		<td><?php echo $bird['ArthroTaxon']['id']; ?>
		</td>
		<td><?php echo $bird['ArthroTaxon']['taxon']; ?>
		</td>
		<td><?php echo $bird['ArthroTaxon']['taxon_name']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['ArthroTaxon']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br>
<?php echo $this->Form->end(); ?>
<?php } echo $this->Html->link('Add Arthropod Details',array('controller' => 'ArthroTaxon', 'action' => 'addArthro'));
?>
<br>
</div>
<br>
