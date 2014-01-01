<?php echo ('论坛首页');?>
<div>
	<?php $i=0;?>
	<?php foreach($allDiscussions as $allDiscussion):?>
		<?php echo h($allDiscussion);?>
		<?php $j=0;?>
		<?php foreach($secordDis[$allDiscussion] as $secord):?>
			<?php echo $this->Html->link($secord,array('controller'=>'Forums','action'=>'posting_list',$i,$j));?>
			<?php 
				if(isset($num[$i][$j]))
					echo $num[$i][$j].'条帖子';
				else 
					echo '0条帖子';
			?>
		<?php $j++;?>
		<?php endforeach;?>
	</br>
	<?php $i++;?>
	<?php endforeach;?>
</div>
