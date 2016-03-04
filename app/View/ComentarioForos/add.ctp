<?php //pr($usuario); ?>
<div class="comentarioForos form">
<?php echo $this->Form->create('ComentarioForo'); ?>
	<fieldset>
		<legend><?php echo __($titulo); ?></legend>
	<?php
		//pr($id_comentario);
		echo $this->Form->input('id_tema', array('type'=>'hidden','value' => $id_comentario['ForoTema']['id']));
		echo $this->Form->input('id_usuario', array('type'=>'hidden','value' => $usuario));
		echo $this->Form->input('comentario', array('type' => 'textarea', 'label' => 'Comentario'));
		echo $this->Form->input('activo', array('type'=>'hidden','value' => 'S'));
		echo $this->Form->input('comentarios', array('type'=>'hidden','value' => $id_comentario['ForoTema']['comentarios']+1));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comentario Foros'), array('action' => 'index')); ?></li>
	</ul>
</div>
