<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Edit Profile</h1>
		</div>
		
		<?=form_open('/ProfilePageView/edit/'.$user['id'])?>
		<p>
			<label for="email_address">Email Address:</label>
			<?=form_input(array('name'=>'email_address', 'id'=>'email_address', 'maxlength'=>'120', 'size'=>'35', 'value'=>(isset($user['email_address']) ? $user['email_address']) : $this -> validation -> ['email_address']))?>
			
			<span>
				<?=(isset($this -> validation) ? $this -> validation -> {'email_address'.'_error'} : '')?>
			</span> 
		</p>
		
		<p>
			<label for="password">Password:</label>
			<?=form_input(array('name'=>'password', 'id'=>'password', 'maxlength'=>'16', 'size'=>'16', 'value'=>(isset($this -> validation -> {'password'}) ? $this -> validation -> {'password'} : '')))?>
			
			<span>
				<?=(isset($this -> validation) ? $this -> validation -> {'password'.'_error'} : '')?>
			</span>
		</p>
		
		<p>
			<label for="password_confirm">Confirm Password:</label>
			<?=form_input(array('name'=>'password_confirm', 'id'=>'password_confirm', 'maxlength'=>'16', 'size'=>'16', 'value'=>(isset($this -> validation) ? $this -> validation -> {'password_confirm'} : '')))?>
			
			<span>
				<?=(isset($this -> validation) ? $this -> validation -> {'password'.'_error'} : '')?>
			</span>
		</p>
		
		<input type="submit" name="Submit" value="save"/>
		<input type="button" name="back" class="submit" value="back" onclick="location.href = '<?=base_url();?>index.php/ProfilePage/<?=$user['username']?>'"/>
		</form>
	</div>
</div>


