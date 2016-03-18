<div style="clear: both;">  
	<div style="text-align: left;margin: 0 auto;width: 68%;">
		<?php echo $this->Form->create('ForoTema', array('type' => 'post',"action" => "buscar", 
	        "id" => "searchForm")); ?>
		<fieldset>
			<legend><?php echo __('Buscar Temas'); ?></legend>
			<?php
				echo $this->Form->input('titulo', array('type' => 'search','maxlength'=>'100','style'=>'width:400px; height:45px;','label' => 'Palabras clave:')); 
			?>
		</fieldset>

		<?php echo $this->Form->end(__('Buscar')); ?>
	</div>
</div>