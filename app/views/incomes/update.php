
<fieldset>
    <?php echo $this->html->form("incomes/update/{$income['idIncome']}", 'POST', 'class="form-horizontal"'); ?>
        <?php $this->renderElement("income.form"); ?>
    </form>
</fieldset>