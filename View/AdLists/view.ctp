<div class="adLists view">
<h2><?php echo __('Ad List'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($adList['AdList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic Url'); ?></dt>
		<dd>
			<?php echo h($adList['AdList']['pic_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company User Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adList['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $adList['CompanyUserInfo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('截至时间');?>
		<dd>
			<?php echo h($adList['AdList']['deadline']); ?>
			&nbsp;
		</dd>
	<?php echo $this->Html->link('返回',array('conditions'=>'AdLists','action'=>'index'));?>
	</dl>
</div>

