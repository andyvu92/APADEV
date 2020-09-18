<?php
$aptify_server_maitenance_oops = variable_get('aptify_server_maitenance_oops', APTIFY_SERVER_MAINTENANCE_OOPS);
?>
<div id="forgot-pw-form">
	<div class="flex-container maintenance-mode">
		<div class="flex-cell user-info">
			<h3 class="light-lead-heading cairo">Oops!</h3>
			<span class="sub-heading"><?php echo $aptify_server_maitenance_oops; ?></span>
		</div>
    <div id="prev-btn"><a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a></div>
	</div>
</div>

