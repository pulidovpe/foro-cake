<?php //pr($subforo['ForoSubforo']['subforo']); ?>
<div style="text-align: center;margin: 0 auto;width: 98%;">
	<!-- IR A INICIO - CATEGORIA -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
	<!-- IR AL SUBFORO DE DONDE VENIMOS -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >>".$this->Html->link(__(h($subforo['ForoSubforo']['subforo'])), array('controller' => 'foroTemas','action' => 'index',h($categoria),h($subforo['ForoSubforo']['id']))); ?></span>
	<!-- EL TEMA ACTUAL -->
	<span style="float: left;font-weight: bold;font-size: 1em;">
	<?php echo "- >>".$this->Html->link(__(h($titulo)), array('controller' => 'foroTemas','action' => 'view',h($categoria),h($subforo['ForoSubforo']['subforo']),h($id_tema))); ?></span>
</div>
<div style="clear: both;width: 98%;">
<?php echo $this->Form->create('ComentarioForo'); ?>
	<fieldset>
		<legend><?php echo __($titulo); ?></legend>
	<?php
		//pr($id_comentario['coment']['temas']);
		$comentarios = $id_comentario['ForoTema']['comentarios']+1;
		echo $this->Form->input('id_tema', array('type'=>'hidden','value' => $id_comentario['ForoTema']['id']));
		echo $this->Form->input('id_usuario', array('type'=>'hidden','value' => $usuario));
		echo $this->Form->input('comentario', array('type' => 'textarea', 'label' => 'Comentario'));
		echo $this->Form->input('activo', array('type'=>'hidden','value' => 'S'));
		echo $this->Form->input('comentarios', array('type'=>'hidden','value' => $comentarios));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>