<script type="text/javascript">
	showMessage("<div style='font-family: sans-serif; text-align: left; margin-top:8px;'><?php echo $message; ?></div>", "<?php echo $type; ?>");
</script>
<?php if($type == 'success'){ ?>
	<script type="text/javascript">
		removeBackdrop();
		$("#divModal").html('');
		if($('.modal-backdrop').length > 0){
			$('body > .modal-backdrop').removeClass('modal-backdrop');
		}		
	</script>
<?php } ?>

