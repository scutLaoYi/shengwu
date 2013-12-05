<div class="inviteBids index">
	<h2><?php echo __('院方招标'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<?php foreach ($inviteBids as $inviteBid): ?>
	<tr>
			<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>	
		<td><?php echo ($message); ?></td>
	
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

