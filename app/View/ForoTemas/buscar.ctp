<div style="clear: both;">  
	<div style="text-align: left;margin: 0 auto;width: 68%;font-size: 0.8em;">
		<?php echo $this->Form->create('ForoTema'); ?>
		<fieldset>
			<legend><?php echo __('Buscar Temas'); ?></legend>
			<div style="width:350px;">
				<?php
					echo $this->Form->input('id', array(
						'name'=>'data[ForoCategoria][id]',
						'label'=>'Categorias: ',
						'style'=>'width:300px;',
						'onchange'=>"return actualiza(
							'../CombosBusquedas/cargarsubforos',
							'capasubforos',this.value);", 
						'options' => $categoria //,'default' => $categoria['0']
					));
				?>
			</div>
			<div id="capasubforos" style="width:350px;">
				<?php 
					if(!isset($subforos)):
						echo $this->Form->input('id', array(
							'name'=>'data[ForoSubforo][id]',
							'label'=>'Sub-Foros: ',
							'style'=>'width:300px;',
							'onchange'=>"return actualiza(
								'../CombosBusquedas/cargartemas',
								'capatemas',this.value );", 
							'options' => array('Seleccione...' => 'Seleccione...')
						));
					endif;
				?>
			</div>
			<div id="capatemas" style="width:350px;">
				<?php
					if(!isset($temas)):
						echo $this->Form->input('id', array(
							'name'=>'data[ForoTema][id]',
							'label'=>'Temas: ',
							'style'=>'width:300px;',
							'onchange'=>"return actualiza(
								'../CombosBusquedas/cargarcomentarios',
								'comentarios',this.value );", 
							'options' => array('Seleccione...' => 'Seleccione...')
						));
					endif;
				?>
			</div>
			<div id="capacomentarios" style="width:350px;">
			</div>
		</fieldset>
		<?php echo $this->Form->end(__('Buscar')); ?>
	</div>
</div>