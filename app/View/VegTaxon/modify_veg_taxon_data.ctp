<html>
<br>

<div>
	<?php echo $this->element('links'); ?>
</div>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Vegetation Taxon</b>
</h2>
<br>
<br><div class="text">
<table>
	<?php echo $this->Form->create('VegTaxon');?>
	<tr>

		<th>ID</th>
		<th>Species ID</th>
		<th>Type ID</th>
		<th>Common Name</th>
		<th>Action</th>
	</tr>

	<?php foreach ($VegTaxon as $bird):?>
	<tr>
		<td><?php echo $bird['VegTaxon']['id']; ?>
		</td>
		<td><?php echo $bird['VegTaxon']['species_id']; ?>
		</td>
		<td><?php echo $bird['VegTaxon']['type']; ?>
		</td>
		<td><?php echo $bird['VegTaxon']['common_name']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['VegTaxon']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br>
<?php echo $this->Form->end(); ?>
<?php } echo $this->Html->link('Add Vegetation Details',array('controller' => 'VegTaxon', 'action' => 'addVeg'));
?>
</div>
<br>
<br>
</html>
