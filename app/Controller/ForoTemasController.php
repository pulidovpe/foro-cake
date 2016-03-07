<?php
App::uses('AppController', 'Controller');
/**
 * ForoTemas Controller
 *
 * @property ForoTema $ForoTema
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 * @property CookieComponent $Cookie
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class ForoTemasController extends AppController {

	public $msg_conectate = 'Debes iniciar sesion para poder hacer publicaciones';
/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js');

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler', 'Session', 'Cookie', 'Auth', 'Session', 'Session',
		'Paginator' => array('limit' => 10,
		'order' => array('id' => 'desc')
	));

	public $paginate = array(
		'limit' => 10,
		'order' => array('id' => 'desc')
	);
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->autoRedirect = true;
        $this->Auth->allow('index','view');
    }
/**
 * index method
 *
 * @return void
 */
	public function index($categoria = null,$id = null) {
		if($id!=NULL) {
			$this->ForoTema->recursive = 0;
			$this->Paginator->settings = array('conditions' => array('ForoTema.id_subforo' => $id));
			$foroTemas = $this->Paginator->paginate('ForoTema');
			$this->set('foro',$id);
			$this->set(compact('foroTemas'));
			// Buscamos el tema
			$this->loadModel('ForoSubforo');
			$options = array('conditions' => array( 'ForoSubforo.id' => $id));
			$subforo = $this->ForoSubforo->find('first', $options);
			$this->set('subforo', $subforo);
			$this->set('categoria',$categoria);
		} else {
			$this->ForoTema->recursive = 0;
			$this->set('foroTemas', $this->Paginator->paginate());
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($categoria = null,$foro = null,$id = null) {
		if (!$this->ForoTema->exists($id)) {
			throw new NotFoundException(__('Invalid foro tema'));
		}
		// Buscamos el tema
		$options = array('conditions' => array('ForoTema.id' => $id));
		$foroTema = $this->ForoTema->find('first', $options);
		$this->set('foroTema', $foroTema);
		//pr($foroTema);echo "Buscamos el tema en ForoTema";
		// Obtener los datos del usuario que creo el tema
		$this->loadModel('User');
		$opciones = array('conditions' => array('User.id' => $foroTema['ForoTema']['id_usuario']));
		$usuario = $this->User->find('first', $opciones);
		$this->set('usuario', $usuario);
		//pr($usuario);echo "Buscamos el usuario con el id de tema";
		// Cargar los comentarios del tema
		$this->loadModel('ComentarioForo');		
		$idtema = $foroTema['ForoTema']['id'];
		$idusuario = $foroTema['ForoTema']['id_usuario'];
		$comentarios = $this->ComentarioForo->query(
			"SELECT comentario_foro.*,users.id,users.username,users.role,users.fecharegistro,users.mensajes,users.avatar
			 FROM comentario_foro JOIN users ON 
			comentario_foro.id_usuario = users.id AND 
			comentario_foro.id_tema = '$idtema'; "
		);
		/*// Limit widgets shown to only those owned by the user.
		SELECT comentario_foro.* FROM comentario_foro 
		INNER JOIN users ON ComentarioForo.id_usuario = users.id 
		WHERE users.id = {current user id}
		$this->paginate = array(
		    'conditions' => array('User.id' => $idusuario),
		    'joins' => array(
		        array(
		            'alias' => 'User',
		            'table' => 'users',
		            'type' => 'INNER',
		            'conditions' => '`User`.`id` = `ComentarioForo`.`id_usuario`'
		        )
		    ),
		    'limit' => 20,
		    'order' => array(
		        'created' => 'desc'
		    )
		);
		$this->set( 'comentarios', $this->paginate( $this->ComentarioForo ) );*/
		$this->set('comentarios', $comentarios);
		$this->set('foro', $foro);
		$this->set('categoria',$categoria);
		// Buscamos el comentario
		/*$this->loadModel('ForoSubforo');
		$options = array('conditions' => array( 'ForoSubforo.id' => $id));
		$subforo = $this->ForoSubforo->find('first', $options);
		$this->set('subforo', $subforo);*/
	}

/**
 * add method
 *
 * @return void
 */
	public function add($categoria = null,$foro = null,$id = null) {
		if(!$this->Auth->login()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
        if($id!=NULL) {
        	$usuario = $this->Session->read('Auth.User.id');
        	$this->loadModel('ForoSubforo');
        	$id_tema = $this->ForoSubforo->find('first',array('conditions' => array('ForoSubforo.id' => $id)));
			$this->set('id_tema',$id_tema);
			$this->set('usuario',$usuario);
		}
		$this->set('foro', $foro);
		$this->set('categoria',$categoria); 
		if ($this->request->is('post')) {
			$this->ForoTema->create();
			if ($this->ForoTema->save($this->request->data)) {
				$contenido = $this->request->data['ForoTema']['contenido'];	
				$id_subforo = $this->request->data['ForoTema']['id_subforo'];			
				// Se incrementa el contador de mensajes en la tabla User
				$n_mensajes = $this->Session->read('Auth.User.mensajes') + 1;
				$this->loadModel('User');
				$this->User->id = $this->Session->read('Auth.User.id');
				$this->User->saveField('mensajes', $n_mensajes);
				// Se copia el tema en la tabla comentarios
				/*$this->loadModel('ComentarioForo');
				$this->request->data['ComentarioForo']['id_tema']    = $this->ForoTema->getLastInsertId();
				$this->request->data['ComentarioForo']['id_usuario'] = $this->Session->read('Auth.User.id');
				$this->request->data['ComentarioForo']['comentario'] = $contenido; 
				$this->request->data['ComentarioForo']['activo']     = 'S';
				$this->request->data['ComentarioForo']['created']    = date("Y-m-d H:i:s");
				$this->ComentarioForo->saveAll($this->request->data);*/
				//
				$this->Session->setFlash(__('El nuevo tema ha sido publicado'),'msg',array('type' => 'success'));
				return $this->redirect(array('action' => 'view',$id_subforo));
			} else {
				$this->Session->setFlash(__('No se pudo realizar la publicacion'),'msg',array('type' => 'danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ForoTema->exists($id)) {
			throw new NotFoundException(__('Invalid foro tema'));
		}
		if(!$this->Auth->login()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ForoTema->save($this->request->data)) {
				$this->Session->setFlash(__('La publicacion fue actualizada'),'msg',array('type' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la publicacion'),'msg',array('type' => 'danger'));
			}
		} else {
			$options = array('conditions' => array('ForoTema.' . $this->ForoTema->primaryKey => $id));
			$this->request->data = $this->ForoTema->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ForoTema->id = $id;
		if (!$this->ForoTema->exists()) {
			throw new NotFoundException(__('Invalid foro tema'));
		}
		if(!$this->Session->started()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
		$this->request->allowMethod('post', 'delete');
		if ($this->ForoTema->delete()) {
			$this->Session->setFlash(__('La publicacion fue eliminada'),'msg',array('type' => 'success'));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar la publicacion'),'msg',array('type' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
