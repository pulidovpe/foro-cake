<div class="comentarioForos form">
<?php echo $this->Form->create('ComentarioForo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Comentario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('id_tema');
		echo $this->Form->input('id_usuario');
		echo $this->Form->input('comentario');
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ComentarioForo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ComentarioForo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comentario Foros'), array('action' => 'index')); ?></li>
	</ul>
</div>
