<div class="users view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($users['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($users['User']['username']); ?>
			&nbsp;
		</dd>
		<!-- <dt>< ?php echo __('Password'); ? ></dt>
		<dd>
			< ?php echo h($users['User']['password']); ? >
			&nbsp;
		</dd> -->
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($users['User']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correo'); ?></dt>
		<dd>
			<?php echo h($users['User']['correo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($users['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($users['User']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Google'); ?></dt>
		<dd>
			<?php echo h($users['User']['google']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($users['User']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de registro'); ?></dt>
		<dd>
			<?php echo h($users['User']['fecharegistro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ultimo acceso'); ?></dt>
		<dd>
			<?php echo h($users['User']['ultimoacceso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($users['User']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($users['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($users['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($users['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $users['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Cambiar Clave'), array('action' => 'edit_clave', $users['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Usuario'), array('action' => 'delete', $users['User']['id']), array(), __('Seguro que desea borrar a # %s?', $users['User']['username'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
