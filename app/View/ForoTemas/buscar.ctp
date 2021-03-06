<div style="clear: both;">  
	<div style="text-align: left;margin: 0 auto;width: 68%;font-size: 0.8em;">
		<?php echo $this->Form->create('ForoTema'); ?>
		<fieldset>
			<legend><?php echo __('Buscar Temas'); ?></legend>
			<div style="width:60%;overflow: visible;">
				<?php
					echo $this->Form->input('id', array(
						'name'=>'data[ForoCategoria][id]',
						'label'=>'Categorias: ',
						'style'=>'width:80%;',
						'onchange'=>"return actualiza(
							'../CombosBusquedas/cargarsubforos',
							'capasubforos',this.value);", 
						'options' => $categoria,
						'empty' => array(0 => 'Seleccione...')
					));
				?>
				<?php echo $this->Form->create('ForoTema'); ?>
				<div id="capasubforos" style="width:80%;">
					<?php 
						echo $this->Form->input('id', array(
							'name'=>'data[ForoSubforo][id]',
							'label'=>'Sub-Foros: ',
							'style'=>'width:80%;',
							'onchange'=>"return actualiza(
								'../CombosBusquedas/cargartemas',
								'capatemas',this.value );", 
							'options' => array('...' => '...')
						));

						echo $this->Form->input('categ', array('type'=>'hidden','value'=>0));
					?>
					<div id="capatemas" style="width:70%;">
						<?php
							echo $this->Form->input('id', array(
								'name'=>'data[ForoTema][id]',
								'label'=>'Temas: ',
								'maxlength'=>'40',
								'style'=>'width:80%;', 
								'onchange'=>"return actualiza(
									'../CombosBusquedas/cargarcomentarios',
									'capacomentarios', this.value );", 
								'options' => array('...' => '...')
							));

							echo $this->Form->input('foro', array('type'=>'hidden','value'=>0));
						?>
						<div id="capacomentarios" style="width:60%;">
							<?php
								echo $this->Form->input('titulo', array('type' => 'hidden'));
								echo $this->Form->input('tema', array('type' => 'hidden'));
							?>
						</div>
					</div>
				</div>
				<?php 
					echo $this->Form->end(__('Buscar'));
				?>
			</div>			
		</fieldset>
	</div>
</div>