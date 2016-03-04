<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Cambiar Clave'); ?></legend>
		<?php
			echo $this->Form->input('username', array('type'=>'text','maxlength'=>'40','style'=>'width:200px; height:40px;','label' => 'Usuario', 'readonly' => 'readonly')); 
			echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:400px; height:40px;','label' => 'Clave'));
			//echo $this->Form->input('password_confirmation', array('type' => 'password','maxlength'=>'40','style'=>'width:400px; height:40px;','label' => 'Confirme Clave'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Actualizar')); ?>
	<!-- Modal -->
	<!-- <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
			  		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
			  		<h4 class="modal-title" id="myModal1Label">Enviar clave al correo registrado.</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							< ?php
								echo $this->Form->input('email', array('type'=>'text','maxlength'=>'40','style'=>'width:450px; height:35px; font:icon;','label' => 'Correo Electrónico:', 'value' => $user['User']['email'], 'readonly' => 'readonly'));
							? >
							<br />
							< ?php
								echo $this->Html->link('Enviar', array('controller' => 'users', 'action' => 'enviarEmailUser2',$user['User']['id'],$user['User']['username'],$user['User']['email']));
							? >
							<button type="button" class="btn btn-info pull-right" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<div class="actions">
	<h3>Acciones</h3>
	<!-- <ul>
		< ?php if ($current_user['permiso07'] == 'S'):  ? >
			<li>< ?php echo $this->Html->link('Listar Usuarios', array('controller' => 'users', 'action' => 'index')); ? ></li>
			<li>< ?php echo $this->Html->link('Volver al Menú', array('controller' => 'inicios', 'action' => 'index2')); ? ></li>
		< ?php else:  ? >
			<li>< ?php echo $this->Html->link('Volver al Menú', array('controller' => 'inicios', 'action' => 'index2')); ? ></li>
		< ?php endif;  ? >
		<li>
			<div class='btn-group btn-group-lg'>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">Enviar clave al correo</button>
			</div>
		</li>
	</ul> -->
</div>