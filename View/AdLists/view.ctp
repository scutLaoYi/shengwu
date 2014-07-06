<div class="action_menu">
	<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
	<h2><?php echo __('广告位'); ?></h2>
	<ul>
		<li id="manage_li1"><?php echo __('Id'); ?></li>
		<li id="manage_li2">
			<?php echo h($adList['AdList']['id']); ?>
			&nbsp;
		</dd>
		<li id="manage_li1"><?php echo __('图片'); ?></li>
		<li id="manage_li2">
			<?php echo $this->Html->image('./'.$adList['AdList']['pic_url'],array('width'=>'200','height'=>'200')); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('公司id'); ?></li>
		<li id="manage_li2">
			<?php echo $this->Html->link($adList['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $adList['CompanyUserInfo']['id'])); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('截至时间');?>
		<li id="manage_li2">
			<?php echo h($adList['AdList']['deadline']); ?>
			&nbsp;
		</li>
	<?php echo $this->Html->link('返回',array('conditions'=>'AdLists','action'=>'index'));?>
	</ul>
</div>
