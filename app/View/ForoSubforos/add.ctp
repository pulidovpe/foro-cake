<div class="foroSubforos form">
<?php echo $this->Form->create('ForoSubforo'); ?>
	<fieldset>
		<legend><?php echo __('Add Foro Subforo'); ?></legend>
	<?php
		echo $this->Form->input('id_foro_categoria');
		echo $this->Form->input('subforo');
		echo $this->Form->input('descripcion', array('type' => 'textarea', 'label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Subforos'), array('action' => 'index')); ?></li>
	</ul>
</div>
