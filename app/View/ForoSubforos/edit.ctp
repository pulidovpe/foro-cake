<div class="foroSubforos form">
<?php echo $this->Form->create('ForoSubforo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Foro Subforo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('id_foro_categoria');
		echo $this->Form->input('subforo');
		echo $this->Form->input('descripcion', array('type' => 'textarea', 'label' => 'Descripción'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ForoSubforo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ForoSubforo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Foro Subforos'), array('action' => 'index')); ?></li>
	</ul>
</div>
