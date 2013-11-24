<h1>Login</h1>

<?php echo $this->html->form("login", 'POST', 'role="form" class="form-horizontal"'); ?>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email:</label>
        <div class="col-sm-10">
            <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
            <?php echo $this->html->linkTo("Sign up", "users/create", 'class="btn btn-default"'); ?>
        </div>
    </div>
</form>