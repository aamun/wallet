<h1>User register</h1>

<?php echo $this->html->form("users/create"); ?>
	<label>Username:</label>
	<input type="text" name="username" value="<?php echo $user['username']; ?>">
	<label>Email:</label>
	<input type="email" name="email" value="<?php echo $user['email']; ?>">
	<label>Password:</label>
	<input type="password" name="password">
	<input type="submit" name="save" value="Register">
</form>