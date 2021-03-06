<?php
App::uses('AppModel', 'Model');
/**
 * ForoTema Model
 *
 */
class ForoTema extends AppModel {

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
        )
    );
    public $hasMany = array(
    	'ComentarioForo' => array(
    		'className' => 'ComentarioForo',
            'foreignKey' => 'id_tema'	
    	)
    );

}
