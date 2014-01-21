<div class="readings form">
<?php echo $this->Form->create('Reading'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reading'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('YearMonthDay');
		echo $this->Form->input('Tmax');
		echo $this->Form->input('Tmin');
		echo $this->Form->input('Tavg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reading.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Reading.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Readings'), array('action' => 'index')); ?></li>
	</ul>
</div>
