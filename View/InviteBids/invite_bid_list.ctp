<div id="bigBox">
<?php ?>
	<div id="action_box">
		<div id="leftBox">
		<div id="bids_title"></div>
		</div>
		<div id="moving_ad"></div>
	</div>	
	<div id="rightBox">
	<div id="yfzb"></div>
	<div id="bids_box">
	<ul>
	<?php foreach ($inviteBids as $inviteBid): ?>
	<li id="bids_li0"><p>招标内容</p></li>
	<li id="bids_li1">
			<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>	
		<?php echo ($message); ?>
	</li>
	<?php endforeach; ?>
	</ul>
	</div>
	
	<div class="paging">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __(
'第{:page}页， 共{:pages}页'
)
	));
	?>	</p>
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</div>
</div>

