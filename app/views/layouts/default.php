<!DOCTYPE html>
<html>
	<head>
    	<title><?php echo $title_for_layout; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="author" content="Aarón Munguía">
		<meta name="generator" content="flavorPHP" />
        <?php echo $this->html->charsetTag("UTF-8"); ?>
        <?php echo $this->html->includeCSS('bootstrap.min'); ?>
        <?php //echo $this->html->includeCSS('bootstrap-theme.min'); ?>

        <?php echo $this->html->includeJs('jquery-1.10.2.min'); ?>
        <?php echo $this->html->includeJs('bootstrap.min'); ?>
	</head>
    <body>
        <?php echo $content_for_layout ?>
    </body>
</html>
