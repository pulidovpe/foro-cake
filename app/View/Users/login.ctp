<div class="center-block" style="width:350px">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<p class="panel-title">Inicio de Sesión</p>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<div class="form-group">
					<p class='text-center'>Conectar como:</p>
					<?php
						echo $this->Form->label('Invitado', 'Invitado');
						echo $this->Form->checkbox('Invitado', array(
							'label' => false,
                        	'checked'=> false,
                        	'onclick' => 'if(this.checked) javascript:invitado("S"); else javascript:invitado("N");'
                        ));
					?>
					<?php
						echo $this->Form->input('username', array(
							'class' => 'form-control', 
							'placeholder' => 'Usuario', 
							'type' => 'text',
							//'disabled'=> true,
							'label' => 'Nickname', 
							'autofocus' => 'autofocus',
							//'value' => 'Invitado',
							//'blur' => 'if(!this.value) document.getElementById("submit").enabled=false; else document.getElementById("submit").enabled=true;'
						));
					?>
					<?php
						echo $this->Form->input('password', array(
							'class' => 'form-control', 
							'placeholder' => 'Clave',
							//'disabled'=> true,
							'type' => 'password', 
							'label' => 'Password',
							//'value' => 'invitado',
							//'blur' => 'if(!this.value) document.getElementById("submit").enabled=false; else document.getElementById("submit").enabled=true;'
						));
					?>
					<?php
						echo $this->Form->submit('Conectar', array(
							'name'=>'btn',
							'class' => 'btn btn-md btn-success btn-block')
						);
						echo $this->Form->end();						
					?>
				</div>
			</fieldset>
		</div>
	</div>
</div>