<div class="foroCategorias view">
<h2><?php echo __('Foro Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($foroCategoria['ForoCategoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($foroCategoria['ForoCategoria']['categoria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($foroCategoria['ForoCategoria']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($foroCategoria['ForoCategoria']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($foroCategoria['ForoCategoria']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Foro Categoria'), array('action' => 'edit', $foroCategoria['ForoCategoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Foro Categoria'), array('action' => 'delete', $foroCategoria['ForoCategoria']['id']), array(), __('Are you sure you want to delete # %s?', $foroCategoria['ForoCategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Foro Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Foro Categoria'), array('action' => 'add')); ?> </li>
	</ul>
</div>
