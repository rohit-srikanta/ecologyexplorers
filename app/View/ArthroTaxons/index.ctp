<div class="arthroTaxons index">
	<h2><?php echo __('Arthro Taxons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('taxon'); ?></th>
			<th><?php echo $this->Paginator->sort('taxon_name'); ?></th>
			<th><?php echo $this->Paginator->sort('date_entered'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($arthroTaxons as $arthroTaxon): ?>
	<tr>
		<td><?php echo h($arthroTaxon['ArthroTaxon']['id']); ?>&nbsp;</td>
		<td><?php echo h($arthroTaxon['ArthroTaxon']['taxon']); ?>&nbsp;</td>
		<td><?php echo h($arthroTaxon['ArthroTaxon']['taxon_name']); ?>&nbsp;</td>
		<td><?php echo h($arthroTaxon['ArthroTaxon']['date_entered']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $arthroTaxon['ArthroTaxon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arthroTaxon['ArthroTaxon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arthroTaxon['ArthroTaxon']['id']), null, __('Are you sure you want to delete # %s?', $arthroTaxon['ArthroTaxon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Arthro Taxon'), array('action' => 'add')); ?></li>
	</ul>
</div>
