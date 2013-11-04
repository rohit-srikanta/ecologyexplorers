<br>
<div>
	<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Data', '/ArthroSamples/modifyDataPickDate');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Vegetation Data</b>
</h2>
<br>
<br><div class="text">


<br>
<br>
<table>
	<?php echo $this->Form->create('VegSample');?>
	<tr>

		<th>ID</th>
		<th>Observer</th>
		<th>Collection Date</th>
		<th>Tree Count</th>
		<th>Cactus Time</th>
		<th>Shrub Time</th>
		<th>Action</th>
	</tr>

	<?php foreach ($VegSample as $bird):?>
	<tr>
		<td><?php echo $bird['VegSample']['id']; ?>
		</td>
		<td><?php echo $bird['VegSample']['observer']; ?>
		</td>
		<td><?php echo $bird['VegSample']['collection_date']; ?>
		</td>
		<td><?php echo $bird['VegSample']['tree_count']; ?>
		</td>
		<td><?php echo $bird['VegSample']['cactus_count']; ?>
		</td>
		<td><?php echo $bird['VegSample']['shrub_count']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['VegSample']['id'],$startDate,$endDate));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br>
<?php echo $this->Form->end(); ?>
<?php } ?>
<br>
</div>
<br>
