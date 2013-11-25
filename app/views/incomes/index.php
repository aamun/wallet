
<?php echo $this->html->linkTo('<span class="glyphicon glyphicon-plus-sign"></span>  Add Income', "incomes/create", 'class="btn btn-success"'); ?>

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
        <?php foreach ($incomes as $key => $income): ?>
            <tr>
                <td><?php echo date('d-m-Y', strtotime($income['income_date'])); ?></td>
                <td><?php echo $income['tags']; ?></td>
                <td class="text-right">$<?php echo number_format($income['amount'], 2); ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->html->linkTo("Edit", "incomes/update/{$income['idIncome']}", 'class="btn btn-primary" role="button"'); ?>
                        <?php echo $this->html->linkToConfirm("Delete", "incomes/delete/{$income['idIncome']}", 'class="btn btn-danger" role="button"'); ?>
                    </div>
                </td>
            </tr>
            <?php $total += $income['amount']; ?>
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