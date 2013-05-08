
<div>
	<?php echo $this->element('links'); ?>
</div>


<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Birds Species Details	', 'modifyBirdTaxonData');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Bird Taxon</b>
</h2>
<br>
<br><div class="text">

<?php echo $this->Html->link('Add Bird Details',array('controller' => 'BirdTaxon', 'action' => 'addBird'));
?><br><br>
<table>
	<?php echo $this->Form->create('BirdTaxon');?>
	<tr>

		<th>ID</th>
		<th>Species ID</th>
		<th>Common Name</th>
		<th>Action</th>
	</tr>

	<?php foreach ($birdTaxon as $bird):?>
	<tr>
		<td><?php echo $bird['BirdTaxon']['id']; ?>
		</td>
		<td><?php echo $bird['BirdTaxon']['species_id']; ?>
		</td>
		<td><?php echo $bird['BirdTaxon']['common_name']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['BirdTaxon']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br>
<?php echo $this->Form->end(); ?>
<?php } echo $this->Html->link('Add Bird Details',array('controller' => 'BirdTaxon', 'action' => 'addBird'));
?>
</div>
