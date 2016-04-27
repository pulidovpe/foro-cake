<?php
	if(isset($temas)):
		echo $this->Form->input('id', array(
			'name' => 'data[ForoTema][id]',
			'label' => 'Temas: ',
			'maxlength' => '40',
			'style' => 'width:80%;', 
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
			'style'=>'width:80%;', 
			'onchange'=>"return actualiza(
				'../CombosBusquedas/cargarcomentarios',
				'capacomentarios', this.value );", 
			'options' => array('...' => '...')
		));
	endif;

	echo $this->Form->input('foro', array('type'=>'hidden','value'=>$id_foro));
?>
<div id="capacomentarios" style="width:60%;"></div>