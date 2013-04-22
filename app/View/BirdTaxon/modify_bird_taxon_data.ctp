<html>
<br>

<div>
	<?php echo $this->element('links'); ?>
</div>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Bird Taxon</b>
</h2>
<br>
<br><div class="text">
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
<?php } echo $this->Html->link('Add Bird Details',array('controller' => 'birdtaxon', 'action' => 'addBird'));
?>
</div>
<br>
<br>
</html>
