<div class = "mainpage">
	
	<div class = "mainpage advertise">
	
<?php
for($id = 1; $id < 41; $id++)
{
	echo $this->Html->image('cake.icon.png');
	if($id % 8 == 0)
	{
		echo '<br/>';
	}
}
?>

	</div>

<!-- ------------infomations-------- -->
	<div class = "mainpage infomation">

		<div class = "mainpage proxyinfo">
			<p>代理信息</p>
		</div>

		<div class = "mainpage companyinfo">
			<p>公司信息</p>
		</div>
		
		<div class = "mainpage recuritmentinfo">
			<p>招聘信息</p>
		</div>

		<div class ="mainpage bbsinfo">
			<p>论坛信息</p>
		</div>

	</div>

<!-- ------------infomations-------- -->

	<div class = "mainpage advertise">

<?php
for($id = 41; $id < 81; $id++)
{
	echo $this->Html->image('cake.power.gif');
	if($id % 8 == 0)
	{
		echo '<br/>';
	}
}
?>

	</div>


</div>
