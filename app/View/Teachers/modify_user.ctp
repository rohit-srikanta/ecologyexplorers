<html>
<br>

<div>
		<?php echo $this->element('links'); ?>
</div>

<?php if('A' == $this->Session->read('UserType'))
{

	?>
<h2>
	<b>User profiles</b>
</h2>
<br>
<br>
<table>
	<?php echo $this->Form->create('ModifyUser');?>
	<tr>

		<th>Name</th>
		<th>Email Address</th>
		<th>School</th>
		<th>Action</th>
		<th>Action</th>
		<th>Action</th>
		<th>Last Login</th>
		<th>Profile Created On</th>
		<th></th>

	</tr>

	<?php foreach ($userList as $teacher):?>
	<tr>
		<td><?php echo $teacher['Teacher']['name']; ?></td>
		<td><?php echo $teacher['Teacher']['email_address']; ?></td>
		<td><?php echo $teacher['Teacher']['school_id']; ?></td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'editUser', $teacher['Teacher']['id']));
		?>
		</td>
		<td><?php  echo $this->Form->postLink(
				'Delete',
				array('action' => 'deleteUser', $teacher['Teacher']['id'],$teacher['Teacher']['name']),
				array('confirm' => 'Are you sure you want to delete the user ?'));
		?>
		</td>
		<td><?php  echo $this->Form->postLink(
				'Reset Password',
				array('action' => 'userResetPassword', $teacher['Teacher']['id'],$teacher['Teacher']['name']),
				array('confirm' => 'Are you sure you want to reset the password ?'));
		?>
		</td>

		<td><?php echo $this->Time->format('F jS, Y h:i A', $teacher['Teacher']['last_login'], null, 'PDT'); ?>
		</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $teacher['Teacher']['date_created'], null, 'PDT'); ?>
		</td>
		<td></td>
</tr>
	<?php endforeach; ?>
</table>
<br>
<?php echo $this->Form->end(); ?>
<?php }
?>

<br>
<br>
</html>
