<html>

<div>
		<?php echo $this->element('links'); ?>
</div>
<br>
<?php if('A' == $this->Session->read('UserType'))
	{ ?>

        	<?php echo $this->Form->create('School', array('class'=>'form'));      
             echo $this->Form->input('school_id',array('type'=>'char','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('school_name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('zipcode',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('city',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
             echo $this->Form->end('Create School'); ?>
 <?php }
?>  
</html>