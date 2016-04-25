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
			throw new NotFoundException(__('Comentario del foro incorrecto'));
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

	/*public function add2() {
		//$comentario = http_build_query($this->request->params['named']['comentario']);
		$this->request->data['ComentarioForo']['id_tema'] 	= $this->request->params['named']['id_tema'];
        $this->request->data['ComentarioForo']['id_usuario']= $this->request->params['named']['id_usuario'];
        $this->request->data['ComentarioForo']['comentario']= $this->request->params['named']['comentario'];
        $this->request->data['ComentarioForo']['created']   = date("Y-n-j H:i:s");
        $this->request->data['ComentarioForo']['modified']  = date("Y-n-j H:i:s");    	
        
        //pr($this->request->params['named']);exit();
        
    	$this->ComentarioForo->saveAll($this->request->data);
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($categoria = null,$idtema = null,$id = null) {
		if (!$this->ComentarioForo->exists($id)) {
			throw new NotFoundException(__('Comentario del foro incorrecto'));
		}
		if(!$this->Auth->login()) {
            $this->Session->setFlash(__($msg_conectate), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
        $this->loadModel('ForoTema');
        $id_tema = $this->ForoTema->find('first',array('conditions' => array('ForoTema.id'=>$idtema)));
		$this->set('id_tema',$id_tema);
		$this->loadModel('ForoSubforo');
        $subforo = $this->ForoSubforo->find('first',array('conditions'=>array('ForoSubforo.id' => $id_tema['ForoTema']['id_subforo'])));
		$this->set('subforo',$subforo);
        
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComentarioForo->save($this->request->data)) {
				// actualizar el contador de comentarios en ForoTema
				$this->loadModel('ForoTema');				
				$tema1 = $this->ForoTema->find('first', array(
					'conditions' => array(
						'ForoTema.id' => $idtema
				)));
				//pr($idforo);die();
				if($tema1['ForoTema']['id'] != $this->request->data['ComentarioForo']['id_tema']):
					$this->ForoTema->id = $tema1['ForoTema']['id'];
					$comenta1 = $tema1['ForoTema']['comentarios'] - 1;
					$this->ForoTema->saveField('comentarios',$comenta1);
					$tema2 = $this->ForoTema->find('first', array(
						'conditions' => array(
							'ForoTema.id' => $this->request->data['ComentarioForo']['id_tema']
					)));
					$this->ForoTema->id = $this->request->data['ComentarioForo']['id_tema'];
					$comenta2 = $tema2['ForoTema']['comentarios'] + 1;
					$this->ForoTema->saveField('comentarios',$comenta2);
				endif;
				if(($this->Session->read('Auth.User.role') < 3) && ($this->Session->read('Auth.User.id') != $this->request->data['ComentarioForo']['id_usuario'])):
					$comentario = $this->request->data['ComentarioForo']['comentario']."\n\n".
								"<---Este comentario ha sido moderado--->";
					$this->ForoTema->saveField('comentario',$comentario);
				endif;

				$this->Session->setFlash(__('La publicacion fue actualizada'),'msg',array('type'=>'success'));
				return $this->redirect(array(
					'controller' => 'foroTemas',
					'action' => 'view',
					$categoria,
					$subforo['ForoSubforo']['subforo'],
					$idtema
				));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la publicacion'),'msg',array('type'=>'danger'));
			}
		} else {
			$options = array('conditions' => array('ComentarioForo.' . $this->ComentarioForo->primaryKey => $id));
			$this->request->data = $this->ComentarioForo->find('first', $options);
			
			$this->loadModel('ForoTema');
	    	$forotema = $this->ForoTema->find('all');
			$this->set('forotema',$forotema);
			
			$id_usuario = $this->ComentarioForo->find('first', array('conditions' => array('ComentarioForo.id' => $id)));
			$this->loadModel('User');
			$usuario = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $id_usuario['ComentarioForo']['id_usuario']
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
	public function delete($id = null,$tema = null) {
		$this->ComentarioForo->id = $id;
		if (!$this->ComentarioForo->exists()) {
			throw new NotFoundException(__('Comentario incorrecto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ComentarioForo->delete()) {
			// Al borrar le resto el numero de comentarios al tema
			$this->loadModel('ForoTema');
			$this->ForoTema->id = $tema;
			$comen = $this->ForoTema->read('comentarios');
			$comen--;
			$this->ForoTema->saveField('comentarios',$comen);
			$this->Session->setFlash(__('La publicacion fue eliminada'),'msg',array('type' => 'success'));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar la publicacion'),'msg',array('type' => 'danger'));
		}
		return $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
	}
}
