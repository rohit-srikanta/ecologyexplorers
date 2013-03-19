<div class="arthroTaxons view">
<h2><?php  echo __('Arthro Taxon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($arthroTaxon['ArthroTaxon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxon'); ?></dt>
		<dd>
			<?php echo h($arthroTaxon['ArthroTaxon']['taxon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxon Name'); ?></dt>
		<dd>
			<?php echo h($arthroTaxon['ArthroTaxon']['taxon_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Entered'); ?></dt>
		<dd>
			<?php echo h($arthroTaxon['ArthroTaxon']['date_entered']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arthro Taxon'), array('action' => 'edit', $arthroTaxon['ArthroTaxon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arthro Taxon'), array('action' => 'delete', $arthroTaxon['ArthroTaxon']['id']), null, __('Are you sure you want to delete # %s?', $arthroTaxon['ArthroTaxon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Arthro Taxons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arthro Taxon'), array('action' => 'add')); ?> </li>
	</ul>
</div>
