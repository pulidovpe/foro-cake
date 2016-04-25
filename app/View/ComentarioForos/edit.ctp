<?php //echo "id_tema <br />";pr($id_tema); ?>
<div style="text-align: center;margin: 0 auto;width: 98%;">
	<!-- IR A INICIO - CATEGORIAS -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
	<!-- IR AL SUBFORO DE DONDE VENIMOS -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >>".$this->Html->link(__(h($subforo['ForoSubforo']['subforo'])), array('controller' => 'foroTemas','action' => 'index',h($categoria),h($subforo['ForoSubforo']['id']))); ?></span>
	<!-- EL TEMA ACTUAL -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__(h($id_tema['ForoTema']['titulo'])), array('controller' => 'foroTemas','action' => 'view',
		h($categoria),
		h($subforo['ForoSubforo']['subforo']),
		h($id_tema['ForoTema']['id']) )); ?>
	</span>
</div>
<div style="clear: both;text-align: left;margin: 0 auto;width: 88%;">
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
			else:
				echo $this->Form->input('id_tema', array('type'=>'hidden'));
			endif;
			echo $this->Form->input('id_usuario', array('type'=>'hidden'));
			echo $this->Form->input('titulo', array(
				'style' => 'width:90%;', 
				'label' => 'Titulo: '
			));
			echo $this->Form->input('comentario', array('type' => 'textarea','class'=>'ckeditor', 'label' => 'Comentario: '));
			echo $this->Form->input('created', array(
				'type'=>'text',
				'style'=>'width:100px;',
				'readonly'=>'readonly',
				'label' => 'Fecha de Creacion: '
			));
			echo $this->Form->input('modified', array('type'=>'hidden','value' => date('Y-m-d')));
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
	<?php echo $this->Form->end(__('Aceptar')); ?>
</div>