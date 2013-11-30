<div class="proxy_list index">

<?php echo $this->element('recruitment_list', array('recruitments',$recruitments));?>
</div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
