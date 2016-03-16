<div class="foroSubforos form">
<?php echo $this->Form->create('ForoSubforo'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Nuevo Foro'); ?></legend>
		<?php 
			foreach ($ForoCategoria as $categoria):
				$opciones[$categoria['ForoCategoria']['id']] = $categoria['ForoCategoria']['categoria'];
			endforeach;
			//pr($opciones);
		?>
	<?php
		echo $this->Form->input('id_foro_categoria',array('label'=>'Categoria','options'=>array($opciones)));
		echo $this->Form->input('subforo', array('label'=>'Foro'));
		echo $this->Form->input('descripcion', array('type' => 'textarea','class'=>'ckeditor', 'label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Publicar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Volver'), array('controller'=>'users','action' => 'index')); ?></li>
	</ul>
</div>
