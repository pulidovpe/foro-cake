<div class="comentarioForos index">
	<h2><?php echo __('Comentario Foros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('id_tema'); ?></th>
			<th><?php echo $this->Paginator->sort('idusuario'); ?></th>
			<th><?php echo $this->Paginator->sort('comentario'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($comentarioForos as $comentarioForo): ?>
	<tr>
		<td><?php echo h($comentarioForo['ComentarioForo']['id']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['id_tema']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['id_usuario']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['comentario']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['activo']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['created']); ?>&nbsp;</td>
		<td><?php echo h($comentarioForo['ComentarioForo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comentarioForo['ComentarioForo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comentarioForo['ComentarioForo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comentarioForo['ComentarioForo']['id']), array(), __('Are you sure you want to delete # %s?', $comentarioForo['ComentarioForo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Comentario Foro'), array('action' => 'add')); ?></li>
	</ul>
</div>
