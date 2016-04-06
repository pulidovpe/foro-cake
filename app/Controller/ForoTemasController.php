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
			//$this->set('foroTemas', $this->Paginator->paginate());
			$this->set('foroTemas', $this->paginate());
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
			throw new NotFoundException(__('Tema Incorrecto'));
		}
		// Buscamos el tema
		$options = array('conditions' => array('ForoTema.id' => $id));
		$foroTema = $this->ForoTema->find('first', $options);
		$this->set('foroTema', $foroTema);
		// Obtener los datos del usuario que creo el tema
		$this->loadModel('User');
		$opciones = array('conditions' => array('User.id' => $foroTema['ForoTema']['id_usuario']));
		$usuario = $this->User->find('first', $opciones);
		$this->set('usuario', $usuario);
		// Cargar los comentarios del tema
		$this->loadModel('ComentarioForo');		
		$idtema = $foroTema['ForoTema']['id'];
		$idusuario = $foroTema['ForoTema']['id_usuario'];
		$comentarios = $this->ComentarioForo->query(
			"SELECT comentario_foro.*,users.id,users.username,users.role,users.fecharegistro,users.temas,users.comentarios,users.firma,users.foto,users.foto_dir,users.ip_cliente
			 FROM comentario_foro JOIN users ON 
			comentario_foro.id_usuario = users.id AND 
			comentario_foro.id_tema = '$idtema'; "
		);
		$this->set('comentarios', $comentarios);
		$this->set('foro', $foro);
		$this->set('categoria',$categoria);
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
				
				$idtema = $this->ForoTema->getLastInsertId();			
				// Se incrementa el contador de mensajes en la tabla forotemas y en user
				$temas = $this->request->data['ForoTema']['temas'];
				$this->loadModel('ForoSubforo');
				$this->ForoSubforo->id = $this->request->data['ForoTema']['id_subforo'];
				$this->ForoSubforo->saveField('temas', $temas);
				$this->loadModel('User');
				$this->User->id = $this->Session->read('Auth.User.id');
				$this->User->saveField('temas', $temas);
				
				$this->Session->setFlash(__('El nuevo tema ha sido publicado'),'msg',array('type' => 'success'));
				return $this->redirect(array(
					'action' => 'view',
					$categoria,
					$foro,
					$idtema
				));
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
	public function edit($categoria = null,$idforo = null, $id = null) {
		if (!$this->ForoTema->exists($id)) {
			throw new NotFoundException(__('Tema incorrecto'));
		}
		if(!$this->Auth->login()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
        $this->loadModel('ForoSubforo');
        $id_foro = $this->ForoSubforo->find('first',array('conditions' => array('ForoSubforo.id' => $idforo)));
		$this->set('id_foro',$id_foro);
		$id_usuario = $this->ForoTema->find('first', array(
				'conditions' => array(
					'ForoTema.id' => $id
			)));
		$this->set('id_usuario',$id_usuario);

		if ($this->request->is(array('post', 'put'))) {
			if ($this->ForoTema->save($this->request->data)) {
				// actualizar el contador de temas en SubForo
				$this->loadModel('ForoSubforo');
				$subforo1 = $this->ForoSubforo->find('first', array(
					'conditions' => array(
						'ForoSubforo.id' => $idforo
				)));
				if($subforo1['ForoSubforo']['id'] != $this->request->data['ForoTema']['id_subforo']):
					$this->ForoSubforo->id = $subforo1['ForoSubforo']['id'];
					$temas1 = $subforo1['ForoSubforo']['temas'] - 1;
					$this->ForoSubforo->saveField('temas',$temas1);
					$subforo2 = $this->ForoSubforo->find('first', array(
						'conditions' => array(
							'ForoSubforo.id' => $this->request->data['ForoTema']['id_subforo']
					)));
					$this->ForoSubforo->id = $this->request->data['ForoTema']['id_subforo'];
					$temas2 = $subforo2['ForoSubforo']['temas'] + 1;
					$this->ForoSubforo->saveField('temas',$temas2);
				endif;
				if(($this->Session->read('Auth.User.role') < 3) && ($this->Session->read('Auth.User.id') != $this->request->data['ForoTema']['id_usuario'])):
					$contenido = $this->request->data['ForoTema']['contenido']."\n\n".
								"<---Este tema ha sido moderado--->";
					$this->ForoTema->saveField('contenido',$contenido);
				endif;
				
				$this->Session->setFlash(__('La publicacion fue actualizada'),'msg',array('type' => 'success'));
				return $this->redirect(array(
					'controller' => 'foroTemas',
					'action' => 'index',
					$categoria,
					$this->request->data['ForoTema']['id_subforo'],
					$idforo
				));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la publicacion'),'msg',array('type' => 'danger'));
			}
		} else {
			$options = array('conditions' => array('ForoTema.' . $this->ForoTema->primaryKey => $id));
			$this->request->data = $this->ForoTema->find('first', $options);

			$this->loadModel('ForoSubforo');
	    	$subforos = $this->ForoSubforo->find('all');
	    	$this->set('subforos',$subforos);
			
			$this->loadModel('User');
			$usuario = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $id_usuario['ForoTema']['id_usuario']
			)));
			$this->set('n_usuario', $usuario['User']['username']);
			$this->set('categoria',$categoria);
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
		return $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
	}

	public function buscar($accion = null) {		
		$this->loadModel('ForoCategoria');
		$this->ForoCategoria->recursive = 0;
		$descripciones = $this->ForoCategoria->find('list', array(
			'fields' => array('id','categoria')));
		array_unshift($descripciones, "Seleccione...");
		//$descripciones['0'] = "Seleccione...";
		$this->set('categoria', $descripciones);

        if ($this->request->is('post')) {
            $buscar = $this->request->data['ForoTema']['titulo'];
            $this->loadModel('ForoTema');
            $this->Paginator->settings = array(
            'conditions' => array(
                'or' => array('ForoTema.titulo LIKE' => '%'.$buscar.'%', 
                'or' => array('ForoTema.contenido LIKE' => '%'.$buscar.'%' ))),
                'limit' => 10
                );
            //$busca = $this->ForoTema->query("SELECT * FROM foro_temas WHERE titulo LIKE '%$buscar%' ");
            $temas = $this->Paginator->paginate('ForoTema');
            if ($temas):                     
                //$this->set(compact('ForoTema'));
                $this->set('foroTemas', $this->paginate());
                $this->render('index_result');
            else:
                $this->Session->setFlash('No se encontró ningún tema relacionado','msg',array('type' => 'danger'));
            endif;
        } 
    }

    public function index_result() {
		/*if($id!=NULL) {
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
		} else {*/
			$this->ForoTema->recursive = 0;
            $this->set('foroTemas', $this->paginate());
		//}
	}
}