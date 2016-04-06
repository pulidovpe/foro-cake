<?php
	if(isset($subforos)):
		echo $this->Form->input('id', array(
			'name'=>'data[ForoSubforo][id]',
			'label'=>'Sub-Foros: ',
			'maxlength'=>'40',
			'style'=>'width:300px;',  
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargartemas',
				'capatemas',this.value );",
			'options' => $subforos,
		));
	else:
		echo $this->Form->input('id', array(
			'name'=>'data[ForoSubforo][id]',
			'label'=>'Sub-Foros: ',
			'maxlength'=>'40',
			'style'=>'width:300px;',  
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargartemas',
				'capatemas',this.value );", 
			'options' => array('Seleccione...' => 'Seleccione...')
		));
	endif;
?>