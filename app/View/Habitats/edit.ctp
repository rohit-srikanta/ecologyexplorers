<div class="habitats form">
<?php echo $this->Form->create('Habitat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Habitat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('recording_date');
		echo $this->Form->input('area');
		echo $this->Form->input('shrubcover');
		echo $this->Form->input('tree_canopy');
		echo $this->Form->input('lawn');
		echo $this->Form->input('other');
		echo $this->Form->input('paved_building');
		echo $this->Form->input('gravel_soil');
		echo $this->Form->input('water');
		echo $this->Form->input('num_traps');
		echo $this->Form->input('trap_arrange');
		echo $this->Form->input('percent_observed');
		echo $this->Form->input('radius');
		echo $this->Form->input('date_entered');
		echo $this->Form->input('site_id');
		echo $this->Form->input('school_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Habitat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Habitat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Habitats'), array('action' => 'index')); ?></li>
	</ul>
</div>
