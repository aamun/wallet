<h2>Sign up</h2>

<?php $this->renderElement('messages'); ?>

<?php echo $this->html->form("users/create", 'POST', 'role="form" class="form-horizontal"'); ?>
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username:</label>
		<div class="col-sm-10">
			<input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-10">
			<input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="Email">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password:</label>
		<div class="col-sm-10">
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label for="confirm_password" class="col-sm-2 control-label">Confirm password:</label>
		<div class="col-sm-10">
			<input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
		</div>
	</div>
	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" name="save" value="Sign up" class="btn btn-primary">
			<?php echo $this->html->linkTo("Log in", "login", 'class="btn btn-default"'); ?>
		</div>
	</div>
</form>