<div class="action_menu">
	<?php echo $this->element('admin_options'); ?>
</div>

<div class="manage_fieldset">
<?php echo $this->Form->create('ProxyInfo'); ?>
	<fieldset>
		<legend><?php echo __('编辑代理信息:'.$this->request->data['ProxyInfo']['product_name']); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('company_user_info_id');
		echo $this->Form->input('endtime', array('label'=>'到期时间', 'type'=>'date','monthNames'=>$allMonth));
		echo $this->Form->input('status', array('label'=>'状态', 'options'=>$allStatus));
	?>
<?php echo $this->Form->end(__('提交')); ?>
	</fieldset>

</div>

