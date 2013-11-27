<div class="well well-lg">
	<h2>Dashboard</h2>
	<p class="lead">Very soon you will see statistic about your finances.</p>

	<p>Meanwhile...</p>
	<?php echo $this->html->linkTo('<span class="glyphicon glyphicon-plus-sign"></span> Add Expenses', 'expenses/create', 'class="btn btn-danger btn-lg"'); ?>
	<?php echo $this->html->linkTo('<span class="glyphicon glyphicon-plus-sign"></span> Add Incomes', 'incomes/create', 'class="btn btn-success btn-lg"'); ?>
</div>