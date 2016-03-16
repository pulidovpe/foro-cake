<div class="foroCategorias form">
<?php echo $this->Form->create('ForoCategoria'); ?>
	<fieldset>
		<legend><?php echo __('Edit Foro Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('categoria');
		echo $this->Form->input('descripcion', array('type' => 'textarea','class'=>'ckeditor', 'label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ForoCategoria.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ForoCategoria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Foro Categorias'), array('action' => 'index')); ?></li>
	</ul>
</div>
