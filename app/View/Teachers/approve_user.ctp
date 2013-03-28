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
<b><h2>New user profiles</h2> </b>
<br>
<br>
<table>
	<?php echo $this->Form->create('Approve',array('class'=>'form'));?>
	<tr>
		<th>Select</th>
		<th>Name</th>
		<th>Email Address</th>
		<th>School</th>
		<th>Profile Created On</th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
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
		<td><?php echo $teacher['Teacher']['school']; ?>
		</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $teacher['Teacher']['date_created'], null, 'PDT'); ?>
		</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<?php echo $this->Form->end('Approve'); ?>
<?php 
	}
	else {
	?>
<b><p class="text">No new user to approve</p> </b>
<?php
	}
}
?>

<br>
<br>
</html>
