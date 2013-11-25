
<fieldset>
    <?php echo $this->html->form("expenses/update/{$expense['idExpense']}", 'POST', 'class="form-horizontal"'); ?>
        <?php $this->renderElement("expense.form"); ?>
    </form>
</fieldset>