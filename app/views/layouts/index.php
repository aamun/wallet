<!DOCTYPE html>
<html>
	<head>
    	<title><?php echo $title_for_layout; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="author" content="Aarón Munguía">
		<meta name="generator" content="flavorPHP" />
        <?php echo $this->html->charsetTag("UTF-8"); ?>
        <?php echo $this->html->includeCSS('bootstrap.min'); ?>
        <?php echo $this->html->includeCSS('skin.index'); ?>
        <?php //echo $this->html->includeCSS('bootstrap-theme.min'); ?>

        <?php echo $this->html->includeJs('jquery-1.9.1'); ?>
        <?php echo $this->html->includeJs('bootstrap.min'); ?>
	</head>
    <body>
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li class="active"><?php echo $this->html->linkTo("Home","index/"); ?></li>
                    <!-- <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li> -->
                </ul>
                <h3 class="text-muted">eWallet</h3>
            </div>
            <?php echo $content_for_layout ?>
            <div class="footer">
                <p>&copy; eWallet 2013</p>
            </div>
        </div>
    </body>
</html>
