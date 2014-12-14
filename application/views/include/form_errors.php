<div class='bg-danger' style='display: <?php echo $showError; ?>'>
	<b>The following errors occurred:</b><br>
	<ul>
	<?php echo validation_errors("<li>", "</li>"); ?>
	</ul>
</div>