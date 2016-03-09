<?php
App::uses('AppController', 'Controller');
/**
 * ComentarioForos Controller
 *
 * @property ComentarioForo $ComentarioForo
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 * @property CookieComponent $Cookie
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class ComentarioForosController extends AppController {

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
	public $components = array('Paginator', 'RequestHandler', 'Session', 'Cookie', 'Auth', 'Session', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ComentarioForo->recursive = 0;
		$this->set('comentarioForos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ComentarioForo->exists($id)) {
			throw new NotFoundException(__('Invalid comentario foro'));
		}
		$options = array('conditions' => array('ComentarioForo.' . $this->ComentarioForo->primaryKey => $id));
		$this->set('comentarioForo', $this->ComentarioForo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($categoria,$titulo = null,$foro = null,$id = null) {
		if(!$this->Auth->login()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
        $this->set('categoria',$categoria);
        $this->set('titulo',$titulo);
        $this->loadModel('ForoSubforo');
        $subforo = $this->ForoSubforo->find('first',array('conditions'=>array('ForoSubforo.id' => $foro)));
		$this->set('subforo',$subforo);
        if($id!=NULL) {
        	$this->set('id_tema',$id);
        	$usuario = $this->Session->read('Auth.User.id');
        	$this->loadModel('ForoTema');
        	$id_comentario = $this->ForoTema->find('first',array('conditions' => array('ForoTema.id' => $id)));
			$this->set('id_comentario',$id_comentario);
			$this->set('usuario',$usuario);
			if ($this->request->is('post')&&(!empty($this->request->data['ComentarioForo']['comentario']))) {
				$this->ComentarioForo->create();
				if ($this->ComentarioForo->save($this->request->data)) {
					
					$idcomenta = $this->ComentarioForo->getLastInsertId();			
					// Se incrementa el contador de mensajes en la tabla forotemas y en user
					$comentarios = $this->request->data['ComentarioForo']['comentarios'];
					$this->loadModel('ForoTema');
					$this->ForoTema->id = $this->request->data['ComentarioForo']['id_tema'];
					$this->ForoTema->saveField('comentarios', $comentarios);
					$this->loadModel('User');
					$this->User->id = $this->Session->read('Auth.User.id');
					$this->User->saveField('comentarios', $comentarios);

					$this->Session->setFlash(__('El nuevo comentario ha sido publicado'),'msg',array('type' => 'success'));
					return $this->redirect(array(
						'controller' => 'foroTemas',
						'action' => 'view',
						$categoria,
						$subforo['ForoSubforo']['subforo'],
						$id
					));
				} else {
					$this->Session->setFlash(__('No se pudo realizar la publicacion'),'msg',array('type'=>'danger'));
				}
			}
		} else {
			$this->Session->setFlash(__('No se recibio id del tema'), 'msg', array('type' => 'danger'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
		}
		
	}

	public function add2() {
		//$comentario = http_build_query($this->request->params['named']['comentario']);
		$this->request->data['ComentarioForo']['id_tema'] 	= $this->request->params['named']['id_tema'];
        $this->request->data['ComentarioForo']['id_usuario']= $this->request->params['named']['id_usuario'];
        $this->request->data['ComentarioForo']['comentario']= $this->request->params['named']['comentario'];
        $this->request->data['ComentarioForo']['created']   = date("Y-n-j H:i:s");
        $this->request->data['ComentarioForo']['modified']  = date("Y-n-j H:i:s");    	
        
        //pr($this->request->params['named']);exit();
        
    	$this->ComentarioForo->saveAll($this->request->data);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ComentarioForo->exists($id)) {
			throw new NotFoundException(__('Invalid comentario foro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComentarioForo->save($this->request->data)) {
				$this->Session->setFlash(__('La publicacion fue actualizada'),'msg',array('type'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la publicacion'),'msg',array('type'=>'danger'));
			}
		} else {
			$options = array('conditions' => array('ComentarioForo.' . $this->ComentarioForo->primaryKey => $id));
			$this->request->data = $this->ComentarioForo->find('first', $options);
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
		$this->ComentarioForo->id = $id;
		if (!$this->ComentarioForo->exists()) {
			throw new NotFoundException(__('Invalid comentario foro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ComentarioForo->delete()) {
			$this->Session->setFlash(__('La publicacion fue eliminada'),'msg',array('type' => 'success'));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar la publicacion'),'msg',array('type' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
