
<?php echo $this->html->linkTo('<span class="glyphicon glyphicon-plus-sign"></span>  Add Expense', "expenses/create", 'class="btn btn-danger"'); ?>

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Tags</th>
            <th class="text-right">Amount</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($expenses as $key => $expense): ?>
            <tr>
                <td><?php echo date('d-m-Y', strtotime($expense['expense_date'])); ?></td>
                <td><?php echo $expense['tags']; ?></td>
                <td class="text-right">$<?php echo number_format($expense['amount'], 2); ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->html->linkTo("Edit", "expenses/update/{$expense['idExpense']}", 'class="btn btn-primary" role="button"'); ?>
                        <?php echo $this->html->linkToConfirm("Delete", "expenses/delete/{$expense['idExpense']}", 'class="btn btn-danger" role="button"'); ?>
                    </div>
                </td>
            </tr>
            <?php $total += $expense['amount']; ?>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" class="text-right">Total:</td>
            <td class="text-right">$<?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
    </tfoot>
</table>

<?php echo $pagination; ?>