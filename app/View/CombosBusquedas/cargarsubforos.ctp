<?php
	if(isset($subforos)):
		echo $this->Form->input('id', array(
			'name' => 'data[ForoSubforo][id]',
			'label' => 'Sub-Foros: ',
			'maxlength' => '40',
			'style' => 'width:80%;',  
			'onchange' => "return actualiza(
				'../CombosBusquedas/cargartemas',
				'capatemas',this.value );",
			'options' => $subforos,
			'empty' => array(0 => 'Seleccione...')
		));
	else:
		echo $this->Form->input('id', array(
			'name' => 'data[ForoSubforo][id]',
			'label' => 'Sub-Foros: ',
			'maxlength' => '40',
			'style' => 'width:80%;',  
			'onchange' => "return actualiza(
				'../CombosBusquedas/cargartemas',
				'capatemas',this.value );", 
			'options' => array('...' => '...')
		));
	endif;

	echo $this->Form->input('categ', array('type'=>'hidden','value'=>$id_categ));
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
	?>
</div>