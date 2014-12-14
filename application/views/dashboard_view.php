<div class='dashboardDiv'>
	<h2>
		Dashboard
		<div class='small'><?php echo $userEmail; ?></div>
	</h2>

	<hr>

	<?php if($error != ""): ?>
		<div class='bg-danger'>
			<ul>
			<?php echo $error; ?>
			</ul>
		</div>
	<?php endif; ?>
	
	
	<?php echo form_open_multipart("dashboard/upload"); ?>
	<div class='form-group'>
	<label>Upload Photo:</label>
		
		<input type='file' name='image'>
		<p class='help-block'>Extensions: .jpg, .gif, .png, .bmp</p>
	</div>
	
	<input type='submit' name='submit' value='Upload' class='btn btn-primary'>
	
	</form>
	
	<hr>

	<h4>Uploaded Photos</h4>

	<div class='photosDiv'>
	
	<?php foreach($photos as $photo): ?>
	
		<div class='photo'><a href='<?php echo base_url().$photo['fileurl']; ?>' target='_blank'><img src='<?php echo base_url().$photo['fileurl']; ?>'></a></div>
	
	<?php endforeach; ?>
	
	<?php if(count($photos) == 0): ?>
	
		<p class='grayBG' align='center'>No Photos Uploaded!</p>
	
	<?php endif; ?>
		
	</div>

</div>