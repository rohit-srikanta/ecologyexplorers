<div class="sites view">
<h2><?php  echo __('Site'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($site['Site']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo $this->Html->link($site['Site']['id'], array('controller' => 'sites', 'action' => 'view', $site['Site']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School'); ?></dt>
		<dd>
			<?php echo h($site['Site']['school']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitename'); ?></dt>
		<dd>
			<?php echo h($site['Site']['sitename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($site['Site']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($site['Site']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($site['Site']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zipcode'); ?></dt>
		<dd>
			<?php echo h($site['Site']['zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Entered'); ?></dt>
		<dd>
			<?php echo h($site['Site']['date_entered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($site['Site']['location']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Site'), array('action' => 'edit', $site['Site']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Site'), array('action' => 'delete', $site['Site']['id']), null, __('Are you sure you want to delete # %s?', $site['Site']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sites'); ?></h3>
	<?php if (!empty($site['Site'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Site Id'); ?></th>
		<th><?php echo __('School'); ?></th>
		<th><?php echo __('Sitename'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Zipcode'); ?></th>
		<th><?php echo __('Date Entered'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($site['Site'] as $site): ?>
		<tr>
			<td><?php echo $site['id']; ?></td>
			<td><?php echo $site['site_id']; ?></td>
			<td><?php echo $site['school']; ?></td>
			<td><?php echo $site['sitename']; ?></td>
			<td><?php echo $site['address']; ?></td>
			<td><?php echo $site['description']; ?></td>
			<td><?php echo $site['city']; ?></td>
			<td><?php echo $site['zipcode']; ?></td>
			<td><?php echo $site['date_entered']; ?></td>
			<td><?php echo $site['location']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sites', 'action' => 'view', $site['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sites', 'action' => 'edit', $site['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sites', 'action' => 'delete', $site['id']), null, __('Are you sure you want to delete # %s?', $site['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
