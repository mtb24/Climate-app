<div class="readings view">
<h2><?php echo __('Reading'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('YearMonthDay'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['YearMonthDay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tmax'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['Tmax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tmin'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['Tmin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tavg'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['Tavg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($reading['Reading']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reading'), array('action' => 'edit', $reading['Reading']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reading'), array('action' => 'delete', $reading['Reading']['id']), null, __('Are you sure you want to delete # %s?', $reading['Reading']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('action' => 'add')); ?> </li>
	</ul>
</div>
