<html>
<br>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php if('A' == $this->Session->read('UserType'))
{

	if(!empty($teachersYetToBeApproved))
	{
		?>
<p><b>New user profiles</b></p>
<br>
<br><div class="text">
<table>
	<?php echo $this->Form->create('Approve',array('class'=>'form'));?>
	<tr>
		<th>Select</th>
		<th>Name</th>
		<th>Email Address</th>
		<th>School</th>
		<th>Profile Created On</th>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($teachersYetToBeApproved as $teacher):?>
	<tr>
		<td><?php echo $this->Form->checkbox($teacher['Teacher']['id'], array('multiple' => 'checkbox', 'label' => false)); ?>
		</td>
		<td><?php echo $teacher['Teacher']['name']; ?>
		</td>
		<td><?php echo $teacher['Teacher']['email_address']; ?>
		</td>
		<td><?php echo $teacher['Teacher']['school_id']; ?>
		</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $teacher['Teacher']['date_created'], null, 'PDT'); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<?php echo $this->Form->end('Approve'); ?>
<?php 
	}
	else {
	?>
</div>
<p>No new user profiles to approve </p>
<?php
	}
}
?>

<br>
<br>
</html>
