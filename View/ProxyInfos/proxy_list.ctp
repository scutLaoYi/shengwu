<div class='actions'>

	<h3>筛选</h3>
	<?php 
echo $this->Form->input('province', array(
	'onchange'=>'search(this.options[this.selectedIndex].value)',
	'options'=>$allCountry
));
?>
</div>

<script>
function search(index)
{
	$.ajax({
		url:'<?php echo Router::url(array(
			'controller'=>'ProxyInfos', 
			'action' => 'fetch'
			)); ?>/' + index,
			cache: false,
			type:'GET',
			dataType:'html',
			data:({type:'original'}),
	success: function (data){
		$("#result").html(data);
	}
	});
}
</script>

<div id = 'result'>
Hello!
</div>
