<br>
<div>
	<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Modify Ecology Explorers Data', '/teachers/modifySpeciesData');
$this->Html->addCrumb('Modify Data', 'modifyDataPickDate');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Arthropod Data</b>
</h2>
<br>
<br><div class="text">


<br>
<br>
<table>
	<?php echo $this->Form->create('ArthroSample');?>
	<tr>

		<th>ID</th>
		<th>Observer</th>
		<th>Comments</th>
		<th>Collection Date</th>
		<th>Action</th>
	</tr>

	<?php foreach ($ArthroSample as $bird):?>
	<tr>
		<td><?php echo $bird['ArthroSample']['id']; ?>
		</td>
		<td><?php echo $bird['ArthroSample']['comments']; ?>
		</td>
		<td><?php echo $bird['ArthroSample']['observer']; ?>
		</td>
		<td><?php echo $bird['ArthroSample']['collection_date']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['ArthroSample']['id'],$startDate,$endDate));?>
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
