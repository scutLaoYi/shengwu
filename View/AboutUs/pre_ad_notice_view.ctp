
	<div id="action_box">
		<?php ?>
		<div id="leftBox">
			<div id="ad_title">
			</div>
		</div>
		<div id="moving_ad">
		</div>
	</div>
	<div id="rightBox">
		<div id="adtitle"></div>
		<div id="ad_Box">
			<?php $message=ereg_replace("\n","</br>\n",$content);?>
			<div id="ad_contents">
				<?php echo ($message);?>
			</div>
		</div>
	</div>

