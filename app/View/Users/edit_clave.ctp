<div style="clear: both;text-align: left;margin: 0 auto;width: 48%;">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<div class="panel-heading">
			<legend><?php echo __('Cambiar Clave'); ?><legend>
		</div>
		<div class="panel-body">
			<div class="form-group"  style="font-size: 0.9em;">
				<table>
					<tr>
						<td>
							<label>Nickname/Usuario</label>
						</td>
						<td>
							<?php
								echo $this->Form->input('username', array(
									'type'=>'text',
									'maxlength'=>'40',
									'style'=>'width:200px;height:40px;'
									,'label' => '',
									'readonly' => 'readonly'
								));
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Su clave actual</label>
						</td>
						<td>
							<?php
								echo $this->Form->input('password_anterior', array(
									'type'=>'password',
									'maxlength'=>'40',
									'style'=>'width:300px; height:40px;',
									'label' => ''
								));
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Su nueva clave</label>
						</td>
						<td>
							<?php 
								echo $this->Form->input('password', array(
									'type'=>'password',
									'maxlength'=>'40',
									'style'=>'width:300px; height:40px;',
									'label' => ''
								));
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Repita nueva clave</label>
						</td>
						<td>
							<?php
								echo $this->Form->input('password_confirmation', array(
									'type' => 'password',
									'maxlength'=>'40',
									'style'=>'width:300px; height:40px;',
									'label' => ''
								));
							?>
						</td>
					</tr>
				</table>
			</div>
			<?php echo $this->Form->end(__('Actualizar')); ?>
		</div>
	</fieldset>
</div>