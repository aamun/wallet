<?php if ($this->messages->issetMessages()): ?>
	<?php foreach ($this->messages->getMessages() as $key => $message): ?>
	<div class="alert alert-<?php echo $message['type']; ?> alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $message['message'] ?>
	</div>
	<?php endforeach ?>
<?php endif ?>