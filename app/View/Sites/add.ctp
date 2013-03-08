<div class="sites form">
<?php echo $this->Form->create('Site'); ?>
	<fieldset>
		<legend><?php echo __('Add Site'); ?></legend>
	<?php
		echo $this->Form->input('site_id');
		echo $this->Form->input('school');
		echo $this->Form->input('sitename');
		echo $this->Form->input('address');
		echo $this->Form->input('description');
		echo $this->Form->input('city');
		echo $this->Form->input('zipcode');
		echo $this->Form->input('date_entered');
		echo $this->Form->input('location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
