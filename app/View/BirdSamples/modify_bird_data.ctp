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
	<b>Bird Data</b>
</h2>
<br>
<br><div class="text">


<br>
<br>
<table>
	<?php echo $this->Form->create('BirdSample');?>
	<tr>

		<th>ID</th>
		<th>Observer</th>
		<th>Comments</th>
		<th>Collection Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Action</th>
	</tr>

	<?php foreach ($BirdSample as $bird):?>
	<tr>
		<td><?php echo $bird['BirdSample']['id']; ?>
		</td>
		<td><?php echo $bird['BirdSample']['comments']; ?>
		</td>
		<td><?php echo $bird['BirdSample']['observer']; ?>
		</td>
		<td><?php echo $bird['BirdSample']['date_entered']; ?>
		</td>
		<td><?php echo $bird['BirdSample']['time_start']; ?>
		</td>
		<td><?php echo $bird['BirdSample']['time_end']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['BirdSample']['id'],$startDate,$endDate));?>
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
