
<fieldset>
    <?php echo $this->html->form("expenses/create", 'POST', 'class="form-horizontal"'); ?>
        <?php $this->renderElement("expense.form"); ?>
    </form>
</fieldset>