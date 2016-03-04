<div class="foroTemas form">
<?php echo $this->Form->create('ForoTema'); ?>
	<fieldset>
		<legend><?php echo __($id_tema['ForoSubforo']['subforo']); ?></legend>
		<?php //pr($id_tema); ?>
	<?php
		echo $this->Form->input('id_subforo', array('type'=>'hidden', 'value' => $id_tema['ForoSubforo']['id'], 'style'=>'width:70px;'));
		echo $this->Form->input('titulo');
		echo $this->Form->input('contenido', array('type' => 'textarea', 'label' => 'Contenido'));
		echo $this->Form->input('fecha', array('readonly'=>'readonly', 'label' => ''));
		echo $this->Form->input('id_usuario', array('type'=>'hidden','value' => $usuario));
		echo $this->Form->input('activo', array('type'=>'hidden','value' => 'S'));
		echo $this->Form->input('temas', array('type'=>'hidden','value' => $id_tema['ForoSubforo']['temas']+1));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>	<ul>

		<li><?php echo $this->Html->link(__('Listar Foro Temas'), array('action' => 'index')); ?></li>
	</ul>
</div>
