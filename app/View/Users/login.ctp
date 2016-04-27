<div class="center-block" style="width:350px">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<p class="panel-title">Inicio de Sesión</p>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<div class="form-group">
					<?php
						echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Usuario', 'type' => 'text', 'label' => 'Nickname', 'autofocus' => 'autofocus'));
					?>
					<?php
						echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Clave', 'type' => 'password', 'label' => 'Password'));
					?>
					<?php
						echo $this->Form->submit('Conectar', array(
							'class' => 'btn btn-md btn-success btn-block')
						);
						echo $this->Form->submit('Ver como Invitado', array(
							'class' => 'btn btn-md btn-info btn-block',
							'name'=>'User[formaction]')
						);
					?>
					<!-- < ?php
						echo $this->Form->button('Ver como Invitado', array('class' => 'btn btn-md btn-info btn-block'));
					? > -->
					<?php 
						echo "<br /><p class='text-center'>CAPTCHA Aun no disponible</p>"; 
					?>
				</div>
			</fieldset>
		</div>
	</div>
</div>