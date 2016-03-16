<div style="clear: both;text-align: left;margin: 0 auto;width: 48%;">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<div class="panel-heading">
			<legend><?php echo __('Cambiar Clave'); ?><legend>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<?php
					echo $this->Form->input('username', array('type'=>'text','maxlength'=>'40','style'=>'width:200px; height:40px;','label' => 'Nickname/Usuario', 'readonly' => 'readonly'));
				?>
				<?php 
					echo $this->Form->input('password', array('type'=>'password','maxlength'=>'40','style'=>'width:350px; height:40px;','label' => 'Indique su Clave:'));
				?>
				<?php
					echo $this->Form->input('password_confirmation', array('type' => 'password','maxlength'=>'40','style'=>'width:350px; height:40px;','label' => 'Repetir su Clave :'));
				?>
			</div>
			<?php echo $this->Form->end(__('Actualizar')); ?>
		</div>
	</fieldset>
</div>