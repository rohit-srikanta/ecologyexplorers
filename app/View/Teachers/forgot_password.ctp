<br>
<div>
	<?php echo $this->element('links'); ?>
</div>
<?php  $this->Html->addCrumb('Forgot Password', 'forgotPassword');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));?>

<br>
<h2>Forgot password</h2><br>

<br><div class="text">
<p>Please enter the email address that you provided during profile creation. The new password will be sent to this email address.</p>
<p>If you do not have access to this email, please send an email to Monica.Elser@asu.edu</p>
<?php echo $this->Form->create('Teacher', array('class'=>'form'));      
echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));?>
<br>
       <?php  echo $this->Form->end('Reset Password'); ?>

</div>
