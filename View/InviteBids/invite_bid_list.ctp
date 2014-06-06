<div id="anotherPageBox">
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
	'format' => __(
'第{:page}页， 共{:pages}页'
)
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

