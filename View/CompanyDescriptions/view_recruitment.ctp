<div id="leftBox">
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
</div>
<div id="rightBox">

<?php echo $this->element('recruitment_list', array('recruitments',$recruitments));?>
</div>

