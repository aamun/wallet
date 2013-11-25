<!DOCTYPE html>
<html>
	<head>
    	<title><?php echo $title_for_layout; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="author" content="Aarón Munguía">
		<meta name="generator" content="flavorPHP" />
        <?php echo $this->html->charsetTag("UTF-8"); ?>
        <?php echo $this->html->includeCSS('bootstrap.min'); ?>
        <?php echo $this->html->includeCSS('skin'); ?>
        <?php //echo $this->html->includeCSS('bootstrap-theme.min'); ?>

        <?php echo $this->html->includeJs('jquery-1.10.2.min'); ?>
        <?php echo $this->html->includeJs('bootstrap.min'); ?>
	</head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo $this->html->linkTo("eWallet", 'index', 'class="navbar-brand"'); ?>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><?php echo $this->html->linkTo("Dashboard", "users/dashboard"); ?></li>
                        <li><?php echo $this->html->linkTo("Incomes", 'incomes'); ?></li>
                        <li><?php echo $this->html->linkTo("Expenses", "expenses"); ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo $this->html->linkTo("Logout", "login/logout"); ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="container">
            <?php echo $content_for_layout ?>
        </div>
    </body>
</html>
