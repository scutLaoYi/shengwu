<div id = 'leftBox'>
<?php
echo $this->element('company_description_option', array('currentId'=>$company_id));
?>
</div>
<div id="rightBox">
<?php
echo $this->element('proxy_list', array('proxyInfos'=>$proxyInfos));
?>
</div>
