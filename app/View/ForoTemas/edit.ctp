<div class="foroTemas form">
<?php echo $this->Form->create('ForoTema'); ?>
	<fieldset>
		<legend><?php echo __('Editar un Tema'); ?></legend>
	<?php
		foreach ($subforos as $foro):
			$opciones[$foro['ForoSubforo']['id']] = $foro['ForoSubforo']['subforo'];
		endforeach;
		//pr($opciones);
		echo $this->Form->input('id', array('type'=>'hidden'));
		// Si es moderador se habilita para moverlo a otro foro
		if($current_user['role'] != 3):
			echo $this->Form->input('id_subforo', array('label'=>'Mover al Foro','options'=>array($opciones)));
		else:
			echo $this->Form->input('id_subforo', array('type'=>'hidden'));
		endif;
		echo $this->Form->input('titulo', array('label' => 'Titulo: '));
		echo $this->Form->input('contenido', array('type' => 'textarea', 'label' => 'Contenido: '));
		echo $this->Form->input('fecha', array('type'=>'text','readonly'=>'readonly', 'label' => 'Fecha de Creacion: '));
		echo $this->Form->input('id_usuario', array('type'=>'hidden'));
		// Si es moderador puede desactivar el tema y muestra el username		
		if($current_user['role'] != 3):
			echo $this->Form->input('usuario', array('readonly'=>'readonly','value' => $n_usuario));
			echo $this->Form->input('activo', array(
					'label'=>'Activar/Desactivar: ',
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ForoTema.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ForoTema.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Foro Temas'), array('action' => 'index')); ?></li>
	</ul>
</div>
