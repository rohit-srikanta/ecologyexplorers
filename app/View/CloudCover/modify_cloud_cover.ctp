<html>
<br>

<div>
	<?php echo $this->element('links'); ?>
</div>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>Cloud Cover</b>
</h2>
<br>
<br><div class="text">
<table>
	<?php echo $this->Form->create('CloudCover');?>
	<tr>

		<th>ID</th>
		<th>Cloud Cover</th>
		<th>Action</th>
	</tr>

	<?php foreach ($CloudCover as $bird):?>
	<tr>
		<td><?php echo $bird['CloudCover']['id']; ?>
		</td>
		<td><?php echo $bird['CloudCover']['cloud_cover_name']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $bird['CloudCover']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br>
<?php echo $this->Form->end(); ?>
<?php } echo $this->Html->link('Add Cloud Cover Details',array('controller' => 'CloudCover', 'action' => 'addCloudCover'));
?>
</div>
<br>
<br>
</html>
