<div class="proxyInfos form">
<?php echo $this->Form->create('ProxyInfo'); ?>
	<fieldset>
		<legend><?php echo __('Add Proxy Info'); ?></legend>
	<?php
		echo $this->Form->input('company_user_info_id');
		echo $this->Form->input('picture_url');
		echo $this->Form->input('product_name');
		echo $this->Form->input('product_code');
		echo $this->Form->input('product_area');
		echo $this->Form->input('product_unit');
		echo $this->Form->input('product_introduce');
		echo $this->Form->input('product_claim');
		echo $this->Form->input('product_support');
		echo $this->Form->input('phone');
		echo $this->Form->input('qq');
		echo $this->Form->input('product_type');
		echo $this->Form->input('function');
		echo $this->Form->input('department');
		echo $this->Form->input('material');
		echo $this->Form->input('deadline');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Proxy Infos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
