<div class="readings index">
	<h2><?php echo __('Readings'); ?></h2>
	<table id="readings" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Date'); ?></th>
			<th><?php echo $this->Paginator->sort('Max Temp'); ?></th>
			<th><?php echo $this->Paginator->sort('Min Temp'); ?></th>
			<th><?php echo $this->Paginator->sort('Avg Temp'); ?></th>
	</tr>
	<?php foreach ($readings as $reading): ?>
	<tr>
		<td><?php echo h($reading['Reading']['YearMonthDay']); ?>&nbsp;</td>
		<td><?php echo h($reading['Reading']['Tmax']); ?>&nbsp;</td>
		<td><?php echo h($reading['Reading']['Tmin']); ?>&nbsp;</td>
		<td><?php echo h($reading['Reading']['Tavg']); ?>&nbsp;</td>
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
	<ul>
		<li><?php echo $this->Html->link(__('Refresh'), array('action' => '#'), array('id' => 'refresh')); ?></li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#refresh").click(function(){
			$request = $.getJSON('/readings/refresh.json', function(json, textStatus) {
				if(json.length != 0) {
					console.log(json.data);
					var html = [];
					$.each(json.data, function(key, val){
						// convert the temperatures and format date
						var date = key;
						var Tmax = ((((val.TMAX /10) *9) /5) +32);
						var Tmin = ((((val.TMIN /10) *9) /5) +32);
						var Tavg = ((Tmax + Tmin) /2);
						html.push( "<tr class='refreshed data'><td>" + date + "</td><td>" + Tmax.toPrecision(2) + "</td><td>" + Tmin.toPrecision(2) + "</td><td>" + Tavg.toPrecision(2) + "</td></tr>" );
					});
					$("table").append(html).slideDown('slow');
				}
			});
		});
	});
</script>
