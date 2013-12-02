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
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad List'), array('action' => 'edit', $adList['AdList']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ad List'), array('action' => 'delete', $adList['AdList']['id']), null, __('Are you sure you want to delete # %s?', $adList['AdList']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Lists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad List'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
