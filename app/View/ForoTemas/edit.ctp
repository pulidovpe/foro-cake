<?php //pr($id_foro); ?>
<div style="text-align: center;margin: 0 auto;width: 98%;">
	<!-- IR A INICIO - CATEGORIAS -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
	<!-- IR AL SUBFORO DE DONDE VINO -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__(h($id_foro['ForoSubforo']['subforo'])), array('controller' => 'foroTemas','action' => 'index',
		h($categoria),
		h($id_foro['ForoSubforo']['id']))); ?>
	</span>
	<!-- EL TEMA ACTUAL -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__(h($id_usuario['ForoTema']['titulo'])), array('controller' => 'foroTemas','action' => 'view',
		h($categoria),
		h($id_foro['ForoSubforo']['subforo']),
		h($id_usuario['ForoTema']['id']) ));  ?>
	</span>
</div>
<div style="clear: both;text-align: left;margin: 0 auto;width: 88%;">
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
			echo $this->Form->input('fecha', array(
				'type'=>'text',
				'style'=>'width:100px;',
				'readonly'=>'readonly', 
				'label' => 'Fecha de Creacion: '
			));
			echo $this->Form->input('id_usuario', array('type'=>'hidden'));
			// Si es moderador puede desactivar el tema y muestra el username		
			if($current_user['role'] != 3):
				echo $this->Form->input('usuario', array(
					'style'=>'width:300px;',
					'readonly'=>'readonly',
					'value' => $n_usuario
				));
				echo $this->Form->input('activo', array(
						'label'=>'Activar/Desactivar: ',
						'options'=>array(
							'S'=>'Activar',
							'N'=>'Desactivar'
					)));
			endif;
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Aceptar')); ?>
</div>