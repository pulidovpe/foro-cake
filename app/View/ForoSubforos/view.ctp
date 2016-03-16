<div class="foroSubforos view">
<h2><?php echo __('Foro Subforo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Foro Categoria'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['id_foro_categoria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subforo'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['subforo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($foroSubforo['ForoSubforo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Foro Subforo'), array('action' => 'edit', $foroSubforo['ForoSubforo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Foro Subforo'), array('action' => 'delete', $foroSubforo['ForoSubforo']['id']), array(), __('Are you sure you want to delete # %s?', $foroSubforo['ForoSubforo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Foro Subforos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Foro Subforo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
