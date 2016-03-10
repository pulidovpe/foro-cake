<div class="comentarioForos form">
<?php echo $this->Form->create('ComentarioForo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Comentario'); ?></legend>
	<?php
		foreach ($forotema as $tema):
			$opciones[$tema['ForoTema']['id']] = $tema['ForoTema']['titulo'];
		endforeach;
		//pr($opciones);
		echo $this->Form->input('id', array('type'=>'hidden'));
		// Si es moderador se habilita para moverlo a otro foro
		if($current_user['role'] != 3):
			echo $this->Form->input('id_tema', array('label'=>'Mover al Tema','options'=>array($opciones)));
		endif;
		echo $this->Form->input('id_usuario', array('type'=>'hidden'));
		echo $this->Form->input('comentario', array('type' => 'textarea', 'label' => 'Comentario'));
		echo $this->Form->input('created', array('readonly'=>'readonly','label' => 'Fecha de Creacion'));
		// Si es moderador puede desactivar el tema y muestra el username		
		if($current_user['role'] != 3):
			echo $this->Form->input('usuario', array('readonly'=>'readonly','value' => $n_usuario));
			echo $this->Form->input('activo', array(
					'label'=>'Activar/Desactivar',
					'options'=>array(
						'S'=>'Activar',
						'N'=>'Desactivar'
				)));
		endif;
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
