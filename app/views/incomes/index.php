
	<?php echo $this->html->linkTo('<span class="glyphicon glyphicon-plus-sign"></span>  Add Income', "incomes/create", 'class="btn btn-success"'); ?>

<table class="table">
	<thead>
		<tr>
			<th>Date</th>
			<th>Tags</th>
			<th>Description</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($incomes as $key => $income): ?>
			<tr>
				<td><?php echo date(strtotime($income['created'])); ?></td>
				<td><?php echo $income['created']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>