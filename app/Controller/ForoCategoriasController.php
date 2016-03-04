<?php
App::uses('AppController', 'Controller');
/**
 * ForoCategorias Controller
 *
 * @property ForoCategoria $ForoCategoria
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 * @property CookieComponent $Cookie
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class ForoCategoriasController extends AppController {

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

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->autoRedirect = true;
        $this->Auth->allow('index');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('ForoSubforo');
		$this->ForoSubforo->recursive = 0;
		//$total = $this->Article->find('count');
		/*$this->Paginator->settings = array(
			'conditions' => array('ForoSubforo.id_foro_categoria' => 1));
		$subforos1 = $this->Paginator->paginate('ForoSubforo');
		$this->set(compact('subforos1'));*/
		$this->set('subforos1', $this->ForoSubforo->find('all', array(
			'conditions' => array('ForoSubforo.id_foro_categoria' => 1)))
		);
		$this->set('subforos2', $this->ForoSubforo->find('all', array(
			'conditions' => array('ForoSubforo.id_foro_categoria' => 2)))
		);
		$this->set('subforos3', $this->ForoSubforo->find('all', array(
			'conditions' => array('ForoSubforo.id_foro_categoria' => 3)))
		);
		$this->ForoCategoria->recursive = 0;
		$this->set('foroCategorias', $this->ForoCategoria->find('all', array(
			'order' => array('ForoCategoria.id' => 'asc')))
		);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ForoCategoria->exists($id)) {
			throw new NotFoundException(__('Invalid foro categoria'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }

		$options = array('conditions' => array('ForoCategoria.' . $this->ForoCategoria->primaryKey => $id));
		$this->set('foroCategoria', $this->ForoCategoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

		if ($this->request->is('post')) {
			$this->ForoCategoria->create();
			if ($this->ForoCategoria->save($this->request->data)) {
				$this->Session->setFlash(__('Se agrego una nueva categoria'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no pudo agregarse'));
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
		if (!$this->ForoCategoria->exists($id)) {
			throw new NotFoundException(__('Invalid foro categoria'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

		if ($this->request->is(array('post', 'put'))) {
			if ($this->ForoCategoria->save($this->request->data)) {
				$this->Session->setFlash(__('La categoria ha sido actualizada'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The foro categoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ForoCategoria.' . $this->ForoCategoria->primaryKey => $id));
			$this->request->data = $this->ForoCategoria->find('first', $options);
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
		$this->ForoCategoria->id = $id;
		if (!$this->ForoCategoria->exists()) {
			throw new NotFoundException(__('Invalid foro categoria'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        
		$this->request->allowMethod('post', 'delete');
		if ($this->ForoCategoria->delete()) {
			$this->Session->setFlash(__('The foro categoria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The foro categoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
