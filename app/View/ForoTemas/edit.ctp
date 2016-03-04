<div class="foroTemas form">
<?php echo $this->Form->create('ForoTema'); ?>
	<fieldset>
		<legend><?php echo __('Edit Foro Tema'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('id_subforo');
		echo $this->Form->input('titulo');
		echo $this->Form->input('contenido');
		echo $this->Form->input('fecha');
		echo $this->Form->input('id_usuario');
		echo $this->Form->input('activo');
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
