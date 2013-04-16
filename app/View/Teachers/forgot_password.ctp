<html>
<br>
<div>
	<?php echo $this->element('links'); ?>
</div>
<br><div class="text">
<p>Please enter the email address that you provided during profile creation. The new password will be sent to this email address.</p>
<p>If you do not have access to this email, please send an email to Monica.Elser@asu.edu</p>
<?php echo $this->Form->create('Teacher', array('class'=>'form'));      
echo $this->Form->input('email_address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));?>
<br>
       <?php  echo $this->Form->end('Reset Password'); ?>

</div>
</html>
