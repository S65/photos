<div class='loginDiv'>
	<h2>REGISTER</h2>
	
	<?php $this->load->view("include/form_errors", $error); ?>

	<?php echo form_open("register"); ?>
		<div class='form-group'>
			<label for='email'>Email:</label>
			<input type='text' class='form-control' name='email' value='<?php echo set_value("email"); ?>'>
		</div>
		
		<div class='form-group'>
			<label for='email'>Password:</label>
			<input type='password' class='form-control' name='password'>
		</div>
		
		<div class='form-group'>
			<label for='email'>Confirm Password:</label>
			<input type='password' class='form-control' name='confirmpassword'>
		</div>
		
		<input type='submit' name='submit' value='Register' class='btn btn-primary'>
		<p>
			Already have an account? <a href='<?php echo base_url(); ?>'>Login</a>
		</p>
	</form>
</div>