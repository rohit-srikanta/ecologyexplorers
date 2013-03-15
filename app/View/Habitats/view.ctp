<div class="habitats view">
<h2><?php  echo __('Habitat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recording Date'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['recording_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shrubcover'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['shrubcover']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tree Canopy'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['tree_canopy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lawn'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['lawn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['other']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paved Building'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['paved_building']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gravel Soil'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['gravel_soil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Water'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['water']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Traps'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['num_traps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trap Arrange'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['trap_arrange']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percent Observed'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['percent_observed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Radius'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['radius']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Entered'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['date_entered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Id'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['site_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School Id'); ?></dt>
		<dd>
			<?php echo h($habitat['Habitat']['school_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Habitat'), array('action' => 'edit', $habitat['Habitat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Habitat'), array('action' => 'delete', $habitat['Habitat']['id']), null, __('Are you sure you want to delete # %s?', $habitat['Habitat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Habitats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Habitat'), array('action' => 'add')); ?> </li>
	</ul>
</div>
