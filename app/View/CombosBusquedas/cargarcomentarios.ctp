<?php
	echo $this->Form->input('titulo', array('type' => 'search','maxlength'=>'100','style'=>'width:350px; height:45px;','label' => 'Palabras clave:'));
	echo $this->Form->input('tema', array('type' => 'hidden','value' => $id_tema));
?>
<div id="resultado"></div>