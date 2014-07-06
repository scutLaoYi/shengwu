<div id="Title"><?php echo ('论坛首页');?></div>
<div id="Title_bottom"></div>
<?php $i=0;?>
	<?php foreach($allDiscussions as $allDiscussion):?>
		<div id="module">
			<div id="topStyle"><?php echo h($allDiscussion);?></div>
				<ul>
					<?php $j=0;?>
					<?php foreach($secordDis[$allDiscussion] as $secord):?>
						<li>
						<?php echo $this->Html->link($secord,array('controller'=>'Forums','action'=>'posting_list',$i,$j));?>
						<p><?php 
						if(isset($num[$i][$j]))
							echo $num[$i][$j].'条帖子';
						else 
							echo '0条帖子';
						?>
						</p>
						</li>
					<?php $j++;?>
					<?php endforeach;?>
				</ul>
			</div>
	<?php $i++;?>
<?php endforeach;?>
