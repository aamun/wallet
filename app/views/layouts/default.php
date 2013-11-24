<!DOCTYPE html>
<html>
	<head>
    	<title><?php echo $title_for_layout; ?></title>
        <meta name="author" content="Aarón Munguía">
		<meta name="generator" content="flavorPHP" />
        <?php echo $this->html->charsetTag("UTF-8"); ?>
        <?php echo $this->html->includeCSS('bootstrap.min'); ?>
        <?php //echo $this->html->includeCSS('bootstrap-theme.min'); ?>

        <?php echo $this->html->includeJs('jquery-1.9.1'); ?>
	</head>
    <body>
        <div class="container">
            <?php echo $content_for_layout ?>
        </div>
    </body>
</html>
