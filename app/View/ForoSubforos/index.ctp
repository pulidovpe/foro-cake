<div class="foroSubforos index">
	<h2><?php echo __('Foro Subforos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('id_foro_categoria'); ?></th>
			<th><?php echo $this->Paginator->sort('subforo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($foroSubforos as $foroSubforo): ?>
	<tr>
		<td><?php echo h($foroSubforo['ForoSubforo']['id']); ?>&nbsp;</td>
		<td><?php echo h($foroSubforo['ForoSubforo']['id_foro_categoria']); ?>&nbsp;</td>
		<td><?php echo h($foroSubforo['ForoSubforo']['subforo']); ?>&nbsp;</td>
		<td><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($foroSubforo['ForoSubforo']['created']); ?>&nbsp;</td>
		<td><?php echo h($foroSubforo['ForoSubforo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $foroSubforo['ForoSubforo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $foroSubforo['ForoSubforo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $foroSubforo['ForoSubforo']['id']), array(), __('Are you sure you want to delete # %s?', $foroSubforo['ForoSubforo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Foro Subforo'), array('action' => 'add')); ?></li>
	</ul>
</div>
