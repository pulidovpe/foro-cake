<div class="foroCategorias form">
<?php echo $this->Form->create('ForoCategoria'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Nueva Categoria'); ?></legend>
	<?php
		echo $this->Form->input('categoria');
		echo $this->Form->input('descripcion', array('type' => 'textarea', 'label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Aceptar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
	</ul>
</div>
