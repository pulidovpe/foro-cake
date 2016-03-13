<?php echo $this->Form->create('User'); ?>
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
	<?php
		echo $this->Form->input('username', array('type'=>'text','maxlength'=>'50','style'=>'width:175px; ','label' => 'Nickname'));
		echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:400px; ','label' => 'Clave'));
		echo $this->Form->input('nombre', array('type'=>'text','maxlength'=>'50','style'=>'width:400px; ','label' => 'Nombre y Apellido'));
		echo $this->Form->input('correo', array('type'=>'email','maxlength'=>'40','style'=>'width:500px;','label' => 'Correo Electrónico'));
		echo $this->Form->input('firma', array('type' => 'textarea', 'label' => 'Firma: '));
		if (($logged_in)&&($current_user['role'] == '1')):
			echo $this->Form->input('role', array(
				'label'=>'Roll a ejercer','options'=>array(3=>'Usuario',2=>'Moderador',1=>'Administrador')));
		else:
			echo $this->Form->input('role', array(
				'label'=>'Roll a ejercer: ','options'=>array(3=>'Usuario')));
		endif;
		
		echo $this->Form->input('fecharegistro', array(
			'type' => 'text',
			'value' => date("Y-m-d"),
			'readonly' => 'readonly',
			'style'=>'width:110px;'
		));
		if (($logged_in)&&($current_user['role'] == '1')):
			echo $this->Form->input('activo',array('label'=>'Usuario activo: ','options' => array( 
				'N' => 'Desactivado', 
				'S' => 'Activado'
			)));
		else:
			echo $this->Form->input('activo', array(
				'label'=>'Usuario activo: ','options'=>array(3=>'Usuario')));
		endif;
		echo $this->Form->input('avatar', array(
			'maxlength'=>'50',
			'style'=>'width:350px;',
			'readonly'=>'readonly',
			'value' => 'Aun no disponible'
		));
		echo 'CAPTCHA Aun no disponible';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrarse')); ?>
</div>
<!--<div class="actions">
	<h3>< ?php echo __('Actions'); ? ></h3>
	<ul>

		<li>< ?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ? ></li>
	</ul>
</div>-->
