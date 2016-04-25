<?php
	if(isset($temas)):
		echo $this->Form->input('id', array(
			'name' => 'data[ForoTema][id]',
			'label' => 'Temas: ',
			'maxlength' => '40',
			'style' => 'width:300px;', 
			'onchange' => "return actualiza(
				'../CombosBusquedas/cargarcomentarios',
				'capacomentarios', this.value );", 
			'options'=> $temas,
			'empty' => array(0 => 'Seleccione...')
		));
	else:
		echo $this->Form->input('id', array(
			'name'=>'data[ForoTema][id]',
			'label'=>'Temas: ',
			'maxlength'=>'40',
			'style'=>'width:300px;', 
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargarcomentarios',
				'capacomentarios', this.value );", 
			'options' => array('...' => '...')
		));
	endif;
?>
<div id="capacomentarios" style="width:50%;"></div>