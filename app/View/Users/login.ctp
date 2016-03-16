<div class="center-block" style="width:300px">
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
					<!-- Change this to a button or input when using this as a form -->
					<?php
						echo $this->Form->submit('Conectar', array('class' => 'btn btn-md btn-success btn-block'));
					?>

					<?php 
						echo "<span style='font-weight: bold;font-size: 1.1em;'>CAPTCHA Aun no disponible</span>"; 
					?>
				</div>
				<!-- <table border="0" align="center" width="100%">
					<tr>
						<td align="center">
							<div class="form-group">
								<button type="button" class="btn btn-lg btn-success btn-warning" data-toggle="modal" data-target="#myModal">Olvidé mi clave!</button>

							</div>
						</td>
					</tr>
				</table> -->
			</fieldset>
		</div>
	</div>
</div>