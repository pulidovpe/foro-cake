<div style="clear: both;">
	<div style="text-align: center;margin: 0 auto;width: 98%;">
<?php

/* Mostrar los mensajes*/

echo $this->Session->flash();

/* Se crea el formulario con la opción para enviar archivos */

echo $this->Form->create('Users', array('type' => 'file'));

/* creamos el input para seleccionar el archivo */

echo $this->Form->input('file',array( 'type' => 'file'));

/* Cerramos el formulario y se coloca en boton para hacer submit */

echo $this->Form->end('Enviar');

?>
	</div>
</div>