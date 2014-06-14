<?php ?>

<div id="anotherPageBox">
<div class="bids_box">
<h2><?php echo __('院方招标'); ?></h2>
	<ul>
	<?php foreach ($inviteBids as $inviteBid): ?>
	<li>
			<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>	
		<?php echo ($message); ?>
	</li>
	<?php endforeach; ?>
	</ul>
</div>
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

