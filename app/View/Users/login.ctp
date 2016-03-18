<div class="center-block" style="width:350px">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Inicio de Sesión</h4>
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
						echo $this->Form->submit('Conectar', array('class' => 'btn btn-md btn-success btn-block'));
					?>

					<?php 
						echo "<span style='font-weight: bold;font-size: 1.1em;'>CAPTCHA Aun no disponible</span>"; 
					?>
				</div>
			</fieldset>
		</div>
	</div>
</div>