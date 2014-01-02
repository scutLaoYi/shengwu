<div id="Title"><?php echo ('论坛首页');?></div>

<?php $i=0;?>
	<?php foreach($allDiscussions as $allDiscussion):?>
		<div id="module">
			<div id="topStyle"><?php echo $allDiscussion;?></div>
				<ul>
				<?php $j=0;?>
				<?php foreach($secordDis[$allDiscussion] as $secord):?>
					<li><?php echo $this->Html->link($secord,array('controller'=>'Forums','action'=>'posting_list',$i,$j++));?></li>
				<?php endforeach;?>
			</ul>
		</div>
	<?php $i++;?>
<?php endforeach;?>
