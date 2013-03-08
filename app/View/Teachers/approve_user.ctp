<html>
<br>

<?php echo $this->Html->link('Home',array('controller' => 'teachers', 'action' => 'back')); ?>

<?php if('A' == $this->Session->read('UserType'))
	{
 		if(0 != sizeof($teachersYetToBeApproved)) 
 		{ 
 ?>
	<b><h2>New user profiles</h2></b><br><br>
	<table>
	<?php echo $this->Form->create('Approve');?>  
	    <tr>
	        <th>Select</th>
	        <th>Name</th>
	        <th>Email Address</th>
	        <th>School</th>
	        <th></th>
	        <th></th>
	        <th></th>
	        <th></th>
	        <th></th>
	        <th></th>
	    </tr>
	
	    <!-- Here is where we loop through our $posts array, printing out post info -->
	    <?php foreach ($teachersYetToBeApproved as $teacher):?>
	    <tr>
	        <td><?php echo $this->Form->checkbox($teacher['Teacher']['id'], array('multiple' => 'checkbox', 'label' => false)); ?></td>
	        <td><?php echo $teacher['Teacher']['name']; ?></td>
			<td><?php echo $teacher['Teacher']['email_address']; ?></td>
	        <td><?php echo $teacher['Teacher']['school']; ?></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	    </tr>
	    <?php endforeach; ?>
	</table>
	<br>
	<?php echo $this->Form->end('Approve'); ?></td>
	<?php } 
	else {
	?>
	<b><p class="text">No new user to approve</p></b>
<?php	}
}
?>

<br>
<br>
</html>