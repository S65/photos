<div class='loginDiv'>
	<h2>LOGIN</h2>
	<?php $this->load->view("include/form_errors", $error); ?>
	<?php echo form_open("verify-login"); ?>
	<div class='form-group'>
		<label for='email'>Email:</label>
		<input type='text' class='form-control' name='email'>
	</div>
	
	<div class='form-group'>
		<label for='email'>Password:</label>
		<input type='password' class='form-control' name='password'>
	</div>
	
	<input type='submit' name='submit' value='Login' class='btn btn-primary'>
	<p>
		No Account? <a href='<?php echo base_url(); ?>register'>Register</a>
	</p>
	</form>
</div>