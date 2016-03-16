<div class="users index">
	<h2><?php echo __('Administración de Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<!-- <th>< ?php echo $this->Paginator->sort('foto'); ? ></th> -->			
			<th><?php echo $this->Paginator->sort('fecharegistro'); ?></th>
			<th><?php echo $this->Paginator->sort('ultimoacceso'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th><?php echo $this->Paginator->sort('ip_cliente'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['role']); ?>&nbsp;</td>
		<!-- <td>< ?php echo $this->Html->Image('../files/user/foto/' . $usuario['User']['foto_dir'] . '/' . 'thumb_' . $usuario['User']['foto']); ? ></td> -->
		<td><?php echo h($usuario['User']['fecharegistro']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['ultimoacceso']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['activo']); ?>&nbsp;</td>
		<td><?php echo h($usuario['User']['ip_cliente']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $usuario['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $usuario['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $usuario['User']['id']), array(), __('Seguro que desea borrar a # %s?', $usuario['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
		echo $this->Paginator->counter(array(
		'format' => __('Página {:page} de {:pages}, 
		mostrando {:current} registros de {:count} en total, 
		empezando en el {:start}, terminando en {:end}')
		));
	?>	
	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->first(__('Primero', true), array(), null, array('class' => 'first disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(__('Último', true), array(), null, array('class' => 'last disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'foroCategorias','action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Nuevo Subforo'), array('controller' => 'foroSubforos','action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'foroCategorias', 'action' => 'index')); ?></li>
		
	</ul>
</div>
