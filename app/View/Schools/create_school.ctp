<div>
		<?php echo $this->element('links'); ?>
</div>

<?php $this->Html->addCrumb('Create School', 'createSchool');
echo $this->Html->getCrumbs(' > ', array(
		'url' => array('controller' => 'teachers', 'action' => 'index'),
		'escape' => false
));
?>
<br>	<br>
<h2>Create School</h2><br>
<?php if('A' == $this->Session->read('UserType'))
	{ ?>

        	<?php echo $this->Form->create('School', array('class'=>'form'));      
             echo $this->Form->input('school_id',array('type'=>'char','label'=>'School Code','div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('school_name',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('address',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('zipcode',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror')));
             echo $this->Form->input('city',array('div'=>'formfield','error' => array('wrap' => 'div','class' => 'formerror'))); 
             echo $this->Form->end('Create School'); ?>
 <?php }
?>  
