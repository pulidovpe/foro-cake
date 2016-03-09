<?php
App::uses('AppController', 'Controller');
/**
 * ForoSubforos Controller
 *
 * @property ForoSubforo $ForoSubforo
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 * @property CookieComponent $Cookie
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class ForoSubforosController extends AppController {

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
		$this->ForoSubforo->recursive = 0;
		$this->set('foroSubforos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ForoSubforo->exists($id)) {
			throw new NotFoundException(__('Invalid foro subforo'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

		$options = array('conditions' => array('ForoSubforo.' . $this->ForoSubforo->primaryKey => $id));
		$this->set('foroSubforo', $this->ForoSubforo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->loadModel('ForoCategoria');
		$this->ForoCategoria->recursive = 0;
		$this->set('ForoCategoria', $this->ForoCategoria->find('all'));

		if ($this->request->is('post')) {
			$this->ForoSubforo->create();
			if ($this->ForoSubforo->save($this->request->data)) {
				
				/*$idtema = $this->ForoTema->getLastInsertId();			
				// Se incrementa el contador de mensajes en la tabla forotemas y en user
				$temas = $this->request->data['ForoTema']['temas'];
				$this->loadModel('ForoSubforo');
				$this->ForoSubforo->id = $this->request->data['ForoTema']['id_subforo'];
				$this->ForoSubforo->saveField('temas', $temas);
				$this->loadModel('User');
				$this->User->id = $this->Session->read('Auth.User.id');
				$this->User->saveField('temas', $temas);*/
				
				$this->Session->setFlash(__('El nuevo foro ha sido agregado'));
				return $this->redirect(array('controller'=>'foroCategorias','action' => 'index'));
				/*return $this->redirect(array(
					'action' => 'view',
					$categoria,
					$foro,
					$idtema
				));*/
			} else {
				$this->Session->setFlash(__('El foro no pudo grabarse'));
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
		if (!$this->ForoSubforo->exists($id)) {
			throw new NotFoundException(__('Invalid foro subforo'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

		if ($this->request->is(array('post', 'put'))) {
			if ($this->ForoSubforo->save($this->request->data)) {
				$this->Session->setFlash(__('The foro subforo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The foro subforo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ForoSubforo.' . $this->ForoSubforo->primaryKey => $id));
			$this->request->data = $this->ForoSubforo->find('first', $options);
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
		$this->ForoSubforo->id = $id;
		if (!$this->ForoSubforo->exists()) {
			throw new NotFoundException(__('Invalid foro subforo'));
		}
		if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

		$this->request->allowMethod('post', 'delete');
		if ($this->ForoSubforo->delete()) {
			$this->Session->setFlash(__('The foro subforo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The foro subforo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
