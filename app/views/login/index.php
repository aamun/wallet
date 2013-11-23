<h1>Login</h1>

<?php echo $this->html->form("login"); ?>
	<p>
		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $user['email']; ?>">
	</p>
	<p>
		<label>Password:</label>
		<input type="password" name="password">
	</p>
	<p>
		<input type="submit" name="login" value="Login">
	</p>
</form>