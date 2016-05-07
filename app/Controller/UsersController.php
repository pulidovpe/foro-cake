 <?php
App::uses('AppController', 'Controller', 'SimplePasswordHasher');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 * @property CookieComponent $Cookie
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

	public $name = 'Users';
    
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
	public $components = array(
		'Paginator'=> array(
			'limit' => 10,
			'order' => array('id' => 'desc')
		)
	);

	public $paginate = array(
        'limit' => 10,
        'order' => array('id' => 'desc')
    );

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->autoRedirect = true;
        //$this->Auth->allow('enviarEmailUser');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
        if($this->Session->read('Auth.User.role')==3) {
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario incorrecto'));
		}
        if(($this->Session->read('Auth.User.role')>1)&&($this->Session->read('Auth.User.id')!=$id)) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }        
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('users', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario fue grabado'),'msg',array('type'=>'success'));
				return $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo grabar'),'msg',array('type'=>'danger'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario incorrecto'));
		}
        if(($this->Session->read('Auth.User.role')>1)&&($this->Session->read('Auth.User.id')!=$id)) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        } else {  
    		if ($this->request->is(array('post', 'put'))) {
                $this->User->id = $id;
    			if ($this->User->save($this->request->data)) {
    				$this->Session->setFlash(__('El usuario fue modificado'),'msg',array('type'=>'success'));
    				return $this->redirect(array('controller' => 'users', 'action' => 'view', $id));
    			} else {
    				$this->Session->setFlash(__('El usuario no pudo modificarse'),'msg',array('type'=>'danger'));
    			}
    		} else {                
    			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    			$this->request->data = $this->User->find('first', $options);
                $foto = $this->request->data;
                $this->set('foto', $foto);
    		}
        }
	}

    public function edit_clave($id = null) {

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario incorrecto'));
        }
        if(($this->Session->read('Auth.User.role')>1)&&($this->Session->read('Auth.User.id')!=$id)) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        } else {
            // Instanciar otro encriptado de clave
            $claveHasher = new SimplePasswordHasher();
            if ($this->request->is('post') || $this->request->is('put')) {
                $clave_formulario = $this->request->data['User']['password'];
                //calcular el tamanio de la clave
                $tama_clave = strlen(utf8_decode($clave_formulario));
                // Encriptar de nuevo las claves
                $this->request->data['User']['password'] = $claveHasher->hash($this->request->data['User']['password']);
                $this->request->data['User']['password_confirmation'] = $claveHasher->hash($this->request->data['User']['password_confirmation']);
                // Encriptar clave anterior
                $this->request->data['User']['password_anterior'] = $claveHasher->hash($this->request->data['User']['password_anterior']);
                // OBTENER DATOS ANTES DE MODIFICARLOS
                $this->loadModel('User');
                $clave_antigua = $this->User->find('first', array('conditions' => array('User.id' => $id)));
                // Si claves actual/anterior no coincide?
                if (strcmp($clave_antigua['User']['password'], $this->request->data['User']['password_anterior']) !== 0) {
                    $this->request->data['User']['password_anterior'] = '';
                    $this->request->data['User']['password'] = '';
                    $this->request->data['User']['password_confirmation'] = '';
                    $this->Session->setFlash(__('Clave anterior incorrecta!'), 'msg', array('type' => 'warning'));
                    // Si las claves no coinciden
                } else
                if (strcmp($this->request->data['User']['password_confirmation'], $this->request->data['User']['password']) !== 0) {
                    $this->request->data['User']['password_anterior'] = '';
                    $this->request->data['User']['password'] = '';
                    $this->request->data['User']['password_confirmation'] = '';
                    $this->Session->setFlash(__('Claves no coinciden!'), 'msg', array('type' => 'warning'));
                }  // Si la clave es menor de 8 caracteres
                elseif($tama_clave < 6) {                
                    unset($clave_formulario);
                    unset($tama_clave);
                    //unset($posicion_coincidencia);
                    $this->Session->setFlash(__('Atencion! La clave no debe ser inferior a 6 caracteres!'), 'msg', array('type' => 'warning'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'edit_clave', $id));
                } elseif ($this->User->saveField('password',$this->request->data['User']['password'])) {
                    $this->Session->setFlash(__('Clave ha sido cambiada'), 'msg', array('type'=>'success'));
                    return $this->redirect(array('controller'=>'users','action' => 'index'));
                } else {
                    $this->Session->setFlash(__('La clave no pudo cambiarse, intente de nuevo!'), 'msg', array('type' => 'danger'));
                    $this->request->data['User']['password_anterior'] = '';
                    $this->request->data['User']['password'] = '';
                    $this->request->data['User']['password_confirmation'] = '';
                }                
            } else {
                $this->request->data = $this->User->read(null, $id);
                unset($this->request->data['User']['password']);
            }
            $this->set('user', $this->User->read());
        }
    }

    public function desconectar($id = null) {

        if($this->Session->read('Auth.User.role')>1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        } else {
            $this->User->id = $id;

            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuario incorrecto'));
            }
            // OBTENER DATOS ANTES DE MODIFICARLOS
            $usuario_conectado = $this->User->find('first', array('conditions' => array('User.id' => $id)));

            $this->Auth->authorize = 'actions';
            if ($this->request->is('post') || $this->request->is('put')) {

                $nueva_conexion = $usuario_conectado['User']['username'];
                //Eliminamos la sesion                  
                $this->loadModel('cake_session');
                $hay_conexion = $this->cake_session->query("DELETE FROM cake_sessions WHERE data LIKE '%$nueva_conexion%' "); 
                $this->request->data['User']['ip_cliente'] = null;

                ///// Dejar constancia en la BD que desconectamos el usuario requerido           
                if ($this->User->saveField('ip_cliente', $this->request->data['User']['ip_cliente'])) {
                    $this->Session->setFlash(__('Usuario ' . $usuario_conectado['User']['username'] . ' ha sido Desconectado'),'msg',array('type'=>'success'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El usuario no se pudo desconectar, INTENTE DE NUEVO.'),'msg',array('type'=>'warning'));
            } else {
                $this->request->data = $this->User->read(null, $id);
                unset($this->request->data['User']['password']);
                return $this->redirect(array('action' => 'index'));
            }
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario incorrecto'));
		}
        if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        } else {
            $this->request->allowMethod('post', 'delete');
            if ($this->User->delete()) {
                $this->Session->setFlash(__('El usuario fue borrado'),'msg',array('type'=>'success'));
            } else {
                $this->Session->setFlash(__('El usuario no pudo borrarse'),'msg',array('type'=>'danger'));
            }
            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
	}

	public function login() {
        if (($this->request->is('post'))&&(!empty($this->request->data['User']['username']))&&(!empty($this->request->data['User']['password']))) {
            //pr($this->request->data);die();                
            // Verificar sesion abierta en otro lado
            $nueva_conexion = $this->request->data['User']['username'];
            //$this->loadModel('User');
            $este_usuario = $this->User->query("SELECT ip_cliente,temas FROM users WHERE username = '$nueva_conexion' ");
            //pr($este_usuario);exit();
            $ahora = date("Y-m-d H:i:s");
            if($this->request->data['User']['Invitado']==0) {
                /*$this->Session->setFlash(__('Indique su nombre de usuario y clave.'), 'msg', array('type' => 'warning'));
                return $this->redirect($this->Auth->logout());*/
                // Obtener Ip del cliente
                $cliente_ip = $this->request->clientIp();
                // Preguntamos si existe un IP guardada
                if (!empty($este_usuario[0]['User']['cliente_ip'])) {
                    //pr($este_usuario);die();
                    $tiempo_transcurrido = (strtotime($ahora) - strtotime($este_usuario[0]['User']['modified']));
                    // Si la ip existe entonces no cerro la sesion al irse
                    if ($este_usuario[0]['ip_cliente']!=NULL) {
                        //Eliminamos la sesion para crear una nueva
                        $this->loadModel('cake_session');
                        $hay_conexion = $this->cake_session->query("DELETE FROM cake_sessions WHERE data ILIKE '%$nueva_conexion%' ");
                        // Si se esta conectando desde otra ip
                        if(strcmp($cliente_ip,$este_usuario[0]['ip_cliente'])!==0) { 
                            $this->Session->setFlash(__('Existia otra sesión abierta, se elimino para permitir su nueva sesion.'), 'msg', array('type' => 'notice'));
                        }
                    } 
                }
            } else {
                // Llenar campo ip
                $cliente_ip = 'I.n.v.i.t.a.d.o';
                // Llevar la cuenta
                $cuantos = $este_usuario[0]['users']['temas'] + 1;
            }  
            //pr($this->request->data);die();
            if ($this->Auth->login()) {
                $id = $this->Session->read('Auth.User.id');
                $mensaje = 'Bienvenido usuario: ' . $this->Session->read('Auth.User.username');
                //$this->request->data = $this->User->read(null, $id);                
                if($this->Session->read('Auth.User.activo')=='S') {
                    // Dejamos constancia en la base de datos de que estas conectado
                    $this->loadModel('User');
                    $this->User->id = $id;
                    $this->request->data['User']['ip_cliente'] = $cliente_ip;
                    if($this->request->data['User']['Invitado']==1):
                        $this->request->data['User']['temas'] = $cuantos;
                        $this->User->saveField('temas',$cuantos);
                    endif;
                    if ($this->User->saveField('ip_cliente',$cliente_ip)) {
                        $this->Session->setFlash(__($mensaje), 'msg', array('type' => 'success'));
                        return $this->redirect($this->Auth->redirect());
                    } else {
                        $this->Session->setFlash(__('Error al iniciar sesión'),'msg',array('type'=>'danger'));
                        $this->redirect($this->Auth->logout());
                        return false;
                    }
                } else {
                    $this->redirect($this->Auth->logout());
                }
            } else {
                //pr($this->Auth);die();
                $this->Session->setFlash(__('Usuario y/o clave incorrecta, INTENTE DE NUEVO!'), 'msg', array('type' => 'danger'));
                $this->request->data['User']['username'] = '';
                $this->request->data['User']['password'] = '';
            }
        }
    }

    public function logout() {
        if ($this->Auth->login()) {
            $id = $this->Session->read('Auth.User.id');
            $invitado = $this->Session->read('Auth.User.username');
            $this->request->data = $this->User->read(null, $id);
            $this->User->id = $id;
            if($invitado=='Invitado'):
                $cuantos = $this->Session->read('Auth.User.temas') - 1;
                $this->request->data['User']['temas'] = $cuantos;
                $this->User->saveField('temas', $this->request->data['User']['temas']);
            endif;            
            $this->request->data['User']['ip_cliente'] = null;
            // Dejar constancia en la BD que nos desconectamos
            if ($this->User->saveField('ip_cliente', $this->request->data['User']['ip_cliente'])) {
                $this->Session->setFlash(__('Sesión cerrada correctamente'), 'msg', array('type' => 'success'));
                $this->redirect($this->Auth->logout());
                return true;
            } else {
                $this->Session->setFlash(__('Error al cerrar la sesión'), 'msg', array('type' => 'danger'));
                return false;
            }
        } else {
            $this->Session->setFlash(__('Debe iniciar sesión primero!'), 'msg', array('type' => 'warning'));
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

}