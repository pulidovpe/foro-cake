<?php
App::uses('AppModel', 'Model');
/**
 * ComentarioForo Model
 *
 */
class ComentarioForo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'comentario_foro';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'id_usuario'
        )/*,
        'ForoTema' => array(
        	'className' => 'ForoTema',
            'foreignKey' => 'id_tema'	
        )*/
    );

}
