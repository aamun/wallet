<div class="form-group">
    <label class="col-md-2 control-label">Amount:</label>
    <div class="col-md-10">
        <input type="text" name="amount" value="<?php echo $income['amount'] ?>" class="form-control" placeholder="0.00">
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Tags:</label>
    <div class="col-md-10">
        <input type="text" name="tags" value="<?php echo $income['tags']; ?>" class="form-control" placeholder="tag, tag2">
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Description:</label>
    <div class="col-md-10">
        <textarea class="form-control" rows="3"><?php echo $income['description']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Date:</label>
    <div class="col-md-10">
        <input type="date" name="income_date" value="<?php echo $income['income_date']; ?>" class="form-control">
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <div class="pull-right">
            <?php echo $this->html->linkTo("Cancel", "incomes", 'class="btn btn-default"'); ?>
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </div>
    </div>
</div>