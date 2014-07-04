<div id="bigBox">
	<?php ?>
	<div id="action_box">
		<div id="leftBox">
			<div id="ad_title">
			</div>
		</div>
		<div id="moving_ad">
		</div>
	</div>
	<div id="rightBox">
		<div id="adtitle"></div>
		<div id="adBox">
			<div id="ad_content">
				<?php $message=ereg_replace("\n","</br>\n",$content);?>
				<?php echo ($message);?>
			</div>
		</div>
	</div>
</div>
