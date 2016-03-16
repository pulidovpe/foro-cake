<div class="users view">
<h2><?php echo __('Perfil de Usuario'); ?></h2>
	<table>
		<tr>
			<td><strong><?php echo __('Avatar'); ?></strong></td>
			<td><?php echo $this->Html->Image('../files/user/foto/' . $users['User']['foto_dir'] . '/' . 'thumb_' . $users['User']['foto']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Nickname'); ?></strong></td>
			<td><?php echo h($users['User']['username']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Nombres y Apellidos'); ?></strong></td>
			<td><?php echo h($users['User']['nombre']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Correo'); ?></strong></td>
			<td><?php echo h($users['User']['correo']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Rol de Usuario'); ?></strong></td>
			<td>
				<?php
					if(($users['User']['role'])==1):
						$op_role = 'Administrador';
					elseif(($users['User']['role'])==2):
						$op_role = 'Moderador';
					elseif(($users['User']['role'])==3):
						$op_role = 'Usuario';
					endif;
					echo h($op_role);
				?>
			</td>
		</tr>
		<tr>
			<td><strong><?php echo __('Facebook'); ?></strong></td>
			<td><?php echo h($users['User']['facebook']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Google'); ?></strong></td>
			<td><?php echo h($users['User']['google']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Twitter'); ?></strong></td>
			<td><?php echo h($users['User']['twitter']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Fecha de registro'); ?></strong></td>
			<td><?php echo h($users['User']['fecharegistro']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Firma'); ?></strong></td>
			<td><?php echo $users['User']['firma']; ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Temas Publicados'); ?></strong></td>
			<td><?php echo h($users['User']['temas']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Comentarios'); ?></strong></td>
			<td><?php echo h($users['User']['comentarios']); ?></td>
		</tr>
		<tr>
			<td><strong><?php echo __('Temas Publicados'); ?></strong></td>
			<td><?php echo h($users['User']['temas']); ?></td>
		</tr>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<?php 
			if($current_user['role']>1):
				$id = $current_user['id'];
			else:
				$id = $users['User']['id'];
				echo "<li>".$this->Html->link(__('Nuevo Usuario'), array('action' => 'add'))."</li>";
				echo "<li>".$this->Form->postLink(__('Eliminar Cuenta'), array('action' => 'delete', $id), array(), __('Seguro que desea eliminar a # %s?', $users['User']['username']))."</li>";
			endif; 
		?>
		<li><?php echo $this->Html->link(__('Editar Perfil'), array('action' => 'edit', $id)); ?></li>
		<li><?php echo $this->Html->link(__('Cambiar Clave'), array('action' => 'edit_clave', $id)); ?></li>
		<li><?php echo $this->Html->link(__('Cargar Imagen'), array('action' => 'cargar_foto')); ?></li>
	</ul>
</div>