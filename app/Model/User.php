<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {

	public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => array(
										'className' => 'Simple',
										'hashType' => 'md5' // sha1, sha256, md5
								)
				)
			)
		)
	);
	
	public function beforeSave($options = array()) {
		if (!$this->id) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash(
					$this->data['User']['password']
			);
		}
		return true;
	}

	function equalToField($array, $field) {
		return strcmp($this->data[$this->alias][key($array)], $this->data[$this->alias][$field]) == 0;
	}
/**
 * Display field
 *
 * @var string
 */
	public $actsAs = array(
			'Upload.Upload' => array(
				'foto' => array(
					'fields' => array(
						'dir' => 'foto_dir'
					),
					'thumbnailMethod' => 'php',
					'thumbnailSizes' => array(
						'vga' => '640x480',
						'thumb' => '150x150'
					),
					'deleteOnUpdate' => true,
					'deleteFolderOnDelete' => true
				)
			)
		);
	
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Esriba su nombre de usuario o nickname',
				//'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'uniqueRule' => array(
						'rule' => 'isUnique',
						'message' => '¡Este Usuario ya Existe!'
				)
		),
		'password' => array(
			'minLength' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor escriba su clave'
			)/*,
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Solo letras y numeros se aceptan.'
			),
			'rule' => '/^[a-z0-9]{8,}$/i',
			'message' => 'Solo letras y numeros se aceptan, minimo 3 caracteres'*/
		),
		'role' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'activo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Especifique si es un usuario activo',
				//'allowEmpty' => false,
				'required' => false
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
				'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => '¡Necesita una dirección de correo!'
				),
				'validEmailRule' => array(
						'rule' => array('email'),
						'message' => '¡Dirección de correo no válida!'
				),
				'uniqueEmailRule' => array(
						'rule' => 'isUnique',
						'message' => '¡Esta dirección de correo ya está registrada!'
				)
		),
		'foto' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => '¡Algo anda mal, intente de nuevo!',
				'on' => 'create'
			),
			'isUnderPhpSizeLimit' => array(
				'rule' => 'isUnderPhpSizeLimit',
				'message' => '¡Archivo excede el límite del tamaño permitido!'
			),
			'isValidMimeType' => array(
				'rule' => array('isValidMimeType', array('image/jpeg','image/png'), false),
				'message' => '¡Sólo se permiten imagenes JPG o PNG!'
			),
			'isBelowMaxSize' => array(
				'rule' => array('isBelowMaxSize', 1048576),
				'message' => '¡La imagen es demasiado grande!'
			),
			'isValidExtension' => array(
				'rule' => array('isValidExtension', array('jpg','jpeg','png'), false),
				'message' => '¡La imagen no tiene la extensión JPG o PNG!'
			),
			'checkUniqueName' => array(
				'rule' => array('checkUniqueName'),
				'message' => '¡La imagen ya se encuentra registrada!',
				'on' => 'update'
			),
		)
	);

	function checkUniqueName($data) {
		$isUnique = $this->find('first', array(
			'fields' => array('User.foto'), 
			'conditions' => array(
				'User.foto' => $data['foto']
		)));

		if(!empty($isUnique)) {
			return false;
		} else {
			return true;
		}
	}

}
