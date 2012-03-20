<div class="container" >
	<?php
	echo form_open('login/create_user');
	?>
	<form class="form-horizontal">
		<fieldset>
			<div class="control-group">
				<div class="controls">
					<h1>Create an Account!</h1>
				</div>
				<legend>
					Personal Information
				</legend>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					$firstNameAttributes = array('id' => 'first_name', 'class' => 'input-xlarge', 'placeholder' => 'First Name', 'type' => 'text', 'name' => 'first_name');
					echo form_input($firstNameAttributes);
					?>
				</div>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					$lastNameAttributes = array('id' => 'last_name', 'class' => 'input-xlarge', 'placeholder' => 'Last Name', 'type' => 'text', 'name' => 'last_name');
					echo form_input($lastNameAttributes);
					?>
				</div>
				<div class="controls">
					<?php
					$emailAttributes = array('id' => 'email_address', 'class' => 'input-xlarge', 'placeholder' => 'Email Address', 'type' => 'text', 'name' => 'email_address');
					echo form_input($emailAttributes);
					?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<div class="control-group">
				<legend>
					Login Info
				</legend>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					$usernameAttributes = array('id' => 'username', 'class' => 'input-xlarge', 'placeholder' => 'Username', 'type' => 'text', 'name' => 'username');
					echo form_input($usernameAttributes);
					?>
				</div>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					$passwordAttributes = array('id' => 'password', 'class' => 'input-xlarge', 'placeholder' => 'Password', 'type' => 'text', 'name' => 'password');
					echo form_password($passwordAttributes);
					?>
				</div>
				<div class="controls">
					<?php
					$passwordAttributes2 = array('id' => 'password2', 'class' => 'input-xlarge', 'placeholder' => 'Password Confirm', 'type' => 'text', 'name' => 'password2');
					echo form_password($passwordAttributes2);
					?>
				</div>
			</div>
			<div class="form-actions">
				<div>
					<?php
					$submitAttributes = array('id' => 'submit', 'class' => 'btn btn-large btn-primary', 'value' => 'Create Account', 'type' => 'submit');
					echo form_submit($submitAttributes);
					?>
				</div>
			</div>
			<?php echo validation_errors('<p class="error">');?>
		</fieldset>
	</form>
	<?php
	form_close();
	?>
</div>