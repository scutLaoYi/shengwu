<div id = 'subPage'>
<?php
echo $this->element('company_description_option', array('currentId'=>$company_id));
?>
<?php
echo $this->element('proxy_list', array('proxyInfos'=>$proxyInfos));
?>
</div>
