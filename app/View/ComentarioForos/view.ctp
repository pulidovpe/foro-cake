<div class="comentarioForos view">
<h2><?php echo __('Comentario Foro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Tema'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['id_tema']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Idusuario'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['idusuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentario'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['comentario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($comentarioForo['ComentarioForo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comentario Foro'), array('action' => 'edit', $comentarioForo['ComentarioForo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comentario Foro'), array('action' => 'delete', $comentarioForo['ComentarioForo']['id']), array(), __('Are you sure you want to delete # %s?', $comentarioForo['ComentarioForo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comentario Foros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comentario Foro'), array('action' => 'add')); ?> </li>
	</ul>
</div>
