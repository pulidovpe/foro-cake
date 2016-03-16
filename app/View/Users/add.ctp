<?php echo $this->Form->create('User', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
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
<div style="clear: both;text-align: left;margin: 0 auto;width: 88%;">
	<legend><?php echo __('Registro de Usuario'); ?></legend>
	<fieldset>
		<table>
			<tr>
				<td>
					<?php echo $this->Form->input('username', array('type'=>'text','maxlength'=>'50','style'=>'width:350px; ','label' => 'Nickname/Username')); ?>
				</td>
				<td>
					<?php echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:350px; ','label' => 'Clave')); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input('nombre', array('type'=>'text','maxlength'=>'50','style'=>'width:400px; ','label' => 'Nombre y Apellido:')); ?>
				</td>
				<td>
					<?php echo $this->Form->input('correo', array('type'=>'email','maxlength'=>'40','style'=>'width:500px;','label' => 'Correo Electrónico:')); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $this->Form->input('firma',array('type'=>'textarea','class'=>'ckeditor','label' => 'Firma:')); ?>					
				</td>
			</tr>
			<tr>
				<td>
					<?php if (($logged_in)&&($current_user['role'] == '1')):
						echo "<span style='font-weight: bold;font-size: 1.1em;'>Tipo de Usuario:</span>";
						echo $this->Form->input('role', array(
							'options'=>array(3=>'Usuario',2=>'Moderador',1=>'Administrador')));
					else:
						echo $this->Form->input('role', array(
							'type'=>'hidden','value'=>3));
					endif; ?>
				</td>
				<td>
					<?php echo $this->Form->input('fecharegistro', array(
						'type' => 'text',
						'value' => date("Y-m-d"),
						'readonly' => 'readonly',
						'style'=>'width:150px;',
						'label' => 'Fecha de Registro:'
					)); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php if (($logged_in)&&($current_user['role'] == '1')):
						echo $this->Form->input('activo',array('label'=>'Usuario activo: ','options' => array( 
							'N' => 'Desactivado', 
							'S' => 'Activado'
						)));
					else:
						echo $this->Form->input('activo', array(
							'type'=>'hidden','value'=>'S'));
					endif; ?>
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
			<?php if(!$logged_in): ?>
			<tr>
				<td colspan="2">
						<?php echo "<span style='font-weight: bold;font-size: 1.1em;'>CAPTCHA Aun no disponible</span>"; ?>
				</td>
			</tr>
			<?php endif; ?>
		</table>
	</fieldset>
<?php echo $this->Form->end(__('Registrarse')); ?>
</div>
<!-- script type="text/javascript">
    CKEDITOR.replace( 'textarea_id', {
    toolbar: [[ 'Bold', 'Italic','Underline','Subscript','Superscript'],],
    width: '700',
    height: '100',
    });
</script -->