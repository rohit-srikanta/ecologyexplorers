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
	<b>Bruchid Data</b>
</h2>
<br>
<br><div class="text">


<br>
<br>
<table>
	<?php echo $this->Form->create('BruchidSample');?>
	<tr>

		<th>ID</th>
		<th>Observer</th>
		<th>Collection Date</th>
		<th>Tree Type</th>
		<th>Site Type</th>
		<th>Location</th>
		<th>Action</th>
	</tr>

	<?php foreach ($BruchidSample as $bird):?>
	<tr>
		<td><?php echo $bird['BruchidSample']['id']; ?>
		</td>
		<td><?php echo $bird['BruchidSample']['observer']; ?>
		</td>
		<td><?php echo $bird['BruchidSample']['collection_date']; ?>
		</td>
		<td><?php echo $bird['BruchidSample']['tree_type']; ?>
		</td>
		<td><?php echo $bird['BruchidSample']['site_type']; ?>
		</td>
		<td><?php echo $bird['BruchidSample']['location']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['BruchidSample']['id'],$startDate,$endDate));?>
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
