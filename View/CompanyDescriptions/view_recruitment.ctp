<div id="action_box">
<?php ?>
<div id="leftBox">
<div id="company_third_title"></div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
</div>
<div id="moving_ad"></div>
</div>
<div id="rightBox">

<?php echo $this->element('recruitment_list', array('recruitments',$recruitments));?>
</div>

