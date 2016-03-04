<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Cambiar Clave'); ?></legend>
		
		<!-- ?php echo "<b style='font-size: 16px;color:red;'>" . __('Usuario: ' . $usuario) . "</b><br /><br />"; ? -->
		<?php
			echo $this->Form->input('username', array('type'=>'text','maxlength'=>'40','style'=>'width:200px; height:20px;','label' => 'Usuario', 'readonly' => 'readonly')); 
			echo $this->Form->input('password_anterior', array('type'=>'password','maxlength'=>'40','style'=>'width:400px; height:20px;','label' => 'Clave Actual'));
			echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:400px; height:20px;','label' => 'Clave Nueva'));
			echo $this->Form->input('password_confirmation', array('type' => 'password','maxlength'=>'40','style'=>'width:400px; height:20px;','label' => 'Confirme Clave'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Desconectar', array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>