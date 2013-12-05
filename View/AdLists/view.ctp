<div class="adLists view">
<h2><?php echo __('广告位'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($adList['AdList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('图片'); ?></dt>
		<dd>
			<?php echo $this->Html->image('./'.$adList['AdList']['pic_url'],array('width'=>'200','height'=>'200')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司id'); ?></dt>
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
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
