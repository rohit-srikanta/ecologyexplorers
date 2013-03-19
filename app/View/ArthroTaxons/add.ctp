<div class="arthroTaxons form">
<?php echo $this->Form->create('ArthroTaxon'); ?>
	<fieldset>
		<legend><?php echo __('Add Arthro Taxon'); ?></legend>
	<?php
		echo $this->Form->input('taxon');
		echo $this->Form->input('taxon_name');
		echo $this->Form->input('date_entered');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Arthro Taxons'), array('action' => 'index')); ?></li>
	</ul>
</div>
