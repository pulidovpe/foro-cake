<?php //pr($id_tema); ?>
<div style="text-align: center;margin: 0 auto;width: 98%;">
	<!-- IR A INICIO - CATEGORIAS -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
	<!-- IR AL SUBFORO DE DONDE VINO -->
	<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__(h($id_tema['ForoSubforo']['subforo'])), array('controller' => 'foroTemas','action' => 'index',h($categoria),h($id_tema['ForoSubforo']['id']))); ?></span>
</div>
<div style="clear: both;width: 98%;">
<?php echo $this->Form->create('ForoTema'); ?>
	<fieldset>
		<legend><?php echo __($id_tema['ForoSubforo']['subforo']); ?></legend>
	<?php
		//pr($id_tema['ForoSubforo']['temas']);
		$temas = $id_tema['ForoSubforo']['temas'] + 1;
		echo $this->Form->input('id_subforo', array('type'=>'hidden', 'value' => $id_tema['ForoSubforo']['id'], 'style'=>'width:70px;'));
		echo $this->Form->input('titulo');
		echo $this->Form->input('contenido', array('type' => 'textarea', 'label' => 'Contenido'));
		echo $this->Form->input('fecha', array('readonly'=>'readonly', 'label' => ''));
		echo $this->Form->input('id_usuario', array('type'=>'hidden','value' => $usuario));
		echo $this->Form->input('activo', array('type'=>'hidden','value' => 'S'));
		echo $this->Form->input('temas', array('type'=>'hidden','value' => $temas));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>