<?php echo $this->Form->create('User', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
<div style="clear: both;text-align: left;margin: 0 auto;width: 88%;">
	<legend><?php echo __('Editar Perfil de Usuario'); ?></legend>
	<fieldset>
	<article style="clear: both;text-align: center;margin: 0 auto;width: 98%">
		<li style="display: inline-block;text-decoration:none;">
			<?php
			echo $this->Form->input('facebook', array(
				'maxlength'=>'50',
				'style'=>'width:150px;',
				'readonly'=>'readonly',
				'value' => 'Aun no disponible'
			)); ?>
		</li>
		<li style="display: inline-block;text-decoration:none;">
			<?php
			echo $this->Form->input('google', array(
				'maxlength'=>'50',
				'style'=>'width:150px;',
				'readonly'=>'readonly',
				'value' => 'Aun no disponible'
			)); ?>
		</li>
		<li style="display: inline-block;text-decoration:none;">
			<?php
			echo $this->Form->input('twitter', array(
				'maxlength'=>'50',
				'style'=>'width:150px;',
				'readonly'=>'readonly',
				'value' => 'Aun no disponible'
			)); ?>
		</li>
	</article>
	<hr />
	<table>
		<tr>
			<td>
				<?php echo $this->Html->Image('../files/user/foto/' . $foto['User']['foto_dir'] . '/' . 'thumb_' . $foto['User']['foto']); ?>
			</td>
			<td>
				<?php echo $this->Form->input('foto', array(
					'type' => 'file',
					'label'=>'Avatar'
				)); ?>
				<?php echo $this->Form->input('foto_dir', array(
					'type' => 'hidden'
				)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('username', array('style'=>'width:350px;','readonly' => 'readonly','label' => 'Nickname/Username:')); ?>
			</td>
			<td>
				<?php echo $this->Form->input('nombre', array('type'=>'text','maxlength'=>'50','style'=>'width:350px; ','label' => 'Nombre y Apellido:')); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('correo', array('type'=>'email','maxlength'=>'40','style'=>'width:400px;','label' => 'Correo Electrónico:')); ?>
			</td>
			<td>
				<?php if (($logged_in)&&($current_user['role'] == '1')):
					echo "<span style='font-weight: bold;font-size: 1.1em;'>Tipo de Usuario:</span>";
					echo $this->Form->input('role', array(
						'label'=>'','options'=>array(3=>'Usuario',2=>'Moderador',1=>'Administrador')));
				else:
					echo "<span style='font-weight: bold;font-size: 1.1em;'>Tipo de Usuario:</span>";
					echo $this->Form->input('role', array(
						'label'=>'','options'=>array(3=>'Usuario')));
				endif; ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('fecharegistro', array(
					'type' => 'text',
					'style'=>'width:150px;',
					'readonly' => 'readonly',
					'value' => date("Y-m-d"),
					'label' => 'Fecha de Registro:'
				)); ?>
			</td>
			<td>
				<?php echo $this->Form->input('ultimoacceso', array(
					'type' => 'text',
					'style'=>'width:150px;',
					'readonly' => 'readonly',
					'value' => date("Y-m-d"),
					'label' => 'Ultimo Acceso:'
				)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('activo',array('label'=>'Usuario activo:','options' => array( 'N' => 'Desactivado', 'S' => 'Activado'))); ?>
			</td>
			<td>
				
			</td>
		</tr>
	</table>
</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Seguro que quieres borrarlo # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
