<?php
	if(isset($temas)):
		echo $this->Form->input('id', array(
			'name'=>'data[ForoTema][id]',
			'label'=>'Temas: ',
			'maxlength'=>'40',
			'style'=>'width:300px;', 
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargarcomentarios',
				'capacomentarios',this.value );", 
			'options'=>$temas
		));
	else:
		echo $this->Form->input('id', array(
			'name'=>'data[ForoTema][id]',
			'label'=>'Temas: ',
			'maxlength'=>'40',
			'style'=>'width:300px;', 
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargarcomentarios',
				'capacomentarios',this.value );", 
			'options' => array('Seleccione...' => 'Seleccione...')
		));
	endif;
?>