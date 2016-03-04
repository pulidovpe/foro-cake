<div class="usuarios form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('style'=>'width:400px;','readonly' => 'readonly'));
		//echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:400px; ','label' => 'Clave'));
		echo $this->Form->input('nombre', array('type'=>'text','maxlength'=>'50','style'=>'width:400px; ','label' => 'Nombre y Apellido'));
		echo $this->Form->input('correo', array('type'=>'email','maxlength'=>'40','style'=>'width:500px;','label' => 'Correo Electrónico'));
		if (($logged_in)&&($current_user['role'] == '1')):
			echo $this->Form->input('role', array(
				'label'=>'Roll a ejercer','options'=>array(3=>'Usuario',2=>'Moderador',1=>'Administrador')));
		else:
			echo $this->Form->input('role', array(
				'label'=>'Roll a ejercer','options'=>array(3=>'Usuario')));
		endif;
		echo $this->Form->input('facebook', array('maxlength'=>'50','style'=>'width:350px;'));
		echo $this->Form->input('google', array('maxlength'=>'50','style'=>'width:350px;'));
		echo $this->Form->input('twitter', array('maxlength'=>'50','style'=>'width:350px;'));
		echo $this->Form->input('fecharegistro', array('value' => date("Y-m-d")));
		echo $this->Form->input('ultimoacceso', array('value' => date("Y-m-d")));
		echo $this->Form->input('activo',array('label'=>'Usuario activo','options' => array( 'N' => 'Desactivado', 'S' => 'Activado')));
		echo $this->Form->input('avatar', array('maxlength'=>'50','style'=>'width:350px;'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Seguro que quieres borrarlo # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
