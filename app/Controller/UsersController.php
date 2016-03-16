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
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
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
			throw new NotFoundException(__('Invalid usuario'));
		}
        if(($this->Session->read('Auth.User.role')!=1)&&($this->Session->read('Auth.User.id')!=$id)) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        }
        
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('users', $this->User->find('first', $options));
        //$this->set('foto', $foto);
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
                //pr($this->data);die();
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
        /*if(($this->Session->read('Auth.User.role')<2)||($this->Session->read('Auth.User.id')!=$id)) {
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
            $this->redirect(array('controller' => 'foroCategorias', 'action' => 'index'));
        } else { */  
    		if ($this->request->is(array('post', 'put'))) {
    			if ($this->User->save($this->request->data)) {
    				$this->Session->setFlash(__('El usuario fue modificado'),'msg',array('type'=>'success'));;
    				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
    			} else {
    				$this->Session->setFlash(__('El usuario no pudo modificarse'),'msg',array('type'=>'danger'));
    			}
    		} else {
    			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    			$foto = $this->request->data = $this->User->find('first', $options);
                $this->set('foto', $foto);
    		}
        //}
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
        //pr($this->Session->read('Auth.User.role'));//die();
        if($this->Session->read('Auth.User.role')!=1) {
            $this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'));
            //$this->Session->setFlash(__('Usted no está autorizado para realizar esa acción!'), 'msg', array('type' => 'warning'));
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
        /*if (isset($this->params['form']['enviar'])) {
            $this->redirect(array('action' => 'enviarEmailUser'));
        } else {*/
            //$this->layout = 'bootstrap';            
            if ($this->request->is('post')) {
				// Verificar sesion abierta en otro lado
                $nueva_conexion = $this->request->data['User']['username'];
                $this->loadModel('User');
                $este_usuario = $this->User->query("SELECT ip_cliente FROM users WHERE username = '$nueva_conexion' ");
                //pr($este_usuario);exit();
                //$ahora = date("Y-m-d H:i:s");
                // Obtener Ip del cliente
                $cliente_ip = $this->request->clientIp();
                if (!empty($este_usuario)) {
                    //$tiempo_transcurrido = (strtotime($ahora) - strtotime($este_usuario[0]['modified']));
                    // Si la ip existe entonces no cerro la sesion al irse
                    if (!empty($este_usuario[0]['ip_cliente'])) {
                    	//Eliminamos la sesion para crear una nueva
                        $this->loadModel('cake_session');
                        $hay_conexion = $this->cake_session->query("DELETE FROM cake_sessions WHERE data ILIKE '%$nueva_conexion%' ");
                    	// Si se esta conectando desde otra ip
                    	if(strcmp($cliente_ip,$este_usuario[0]['ip_cliente'])!==0) { 
                            $this->Session->setFlash(__('Existia otra sesión abierta, se elimino para permitir su nueva sesion.'), 'msg', array('type' => 'notice'));
                            //$this->Session->setFlash(__('Existia otra sesión abierta, se elimino para permitir su nueva sesion'));
                        }                       
                    } 
                }
            	//$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
            	//echo Security::hash($this->request->data['User']['password'], null, true);  
            	//debug($this->Auth->login()); die();
                if ($this->Auth->login()) {
                	//pr($este_usuario);exit();
                    $id = $this->Session->read('Auth.User.id');
                    $mensaje = 'Bienvenido ' . $this->Session->read('Auth.User.username');
                    $this->request->data = $this->User->read(null, $id);
                    // Dejamos constancia en la base de datos de que estas conectado
                    $this->request->data['User']['ip_cliente'] = $cliente_ip;

                    if($this->Session->read('Auth.User.activo')=='S') {
                        if ($this->User->saveField('ip_cliente', $this->request->data['User']['ip_cliente'])) {
                            $this->Session->setFlash(__($mensaje), 'msg', array('type' => 'success'));
                            //$this->Session->setFlash(__('Bienvenido #%s', $nueva_conexion));
                            // Para el KCFINDER
                            //$_SESSION['KCEDITOR']['disabled']=false;
                            return $this->redirect($this->Auth->redirect());
                        } else {
                            $this->Session->setFlash(__('Error al iniciar sesión'),'msg',array('type'=>'danger'));
                            //$this->Session->setFlash(__('Error al iniciar sesión'));
                            $this->redirect($this->Auth->logout());
                            return false;
                        }
                    } else {
                        $this->redirect($this->Auth->logout());
                    }
				} else {                    
                    $this->Session->setFlash(__('Usuario y/o clave incorrecta, INTENTE DE NUEVO!'), 'msg', array('type' => 'danger'));
                    //$this->Session->setFlash(__('Usuario y/o clave incorrecta'));
                    //pr($this->request->data['User']); echo " No entro "; die();
                    $this->request->data['User']['password'] = '';
                }
            }
        //}
    }

    public function logout() {
        if ($this->Auth->login()) {
            $id = $this->Session->read('Auth.User.id');
            $this->request->data = $this->User->read(null, $id);
            $this->User->id = $id;
            $this->request->data['User']['ip_cliente'] = null;
            ///// Dejar constancia en la BD que nos desconectamos
            if ($this->User->saveField('ip_cliente', $this->request->data['User']['ip_cliente'])) {
                $this->Session->setFlash(__('Sesión cerrada correctamente'), 'msg', array('type' => 'success'));
                //$this->Session->setFlash(__('Sesión cerrada correctamente'));
                $this->redirect($this->Auth->logout());
                return true;
            } else {
                $this->Session->setFlash(__('Error al cerrar la sesión'), 'msg', array('type' => 'danger'));
                //$this->Session->setFlash(__('Error al cerrar la sesión'));
                return false;
            }
        } else {
            $this->Session->setFlash(__('Debe iniciar sesión primero!'), 'msg', array('type' => 'danger'));
            //$this->Session->setFlash(__('Debe iniciar sesión primero'));
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    public function edit_clave($id = null) {

        $this->User->id = $id;
        //pr($id);
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario incorrecto'));
        }
        // Instanciar otro encriptado de clave
        $claveHasher = new SimplePasswordHasher();

        //$this->request->allowMethod('edit_clave');
        if ($this->request->is('post') || $this->request->is('put')) {

            // Encriptar de nuevo las claves
            $this->request->data['User']['password'] = $claveHasher->hash($this->request->data['User']['password']);
            $this->request->data['User']['password_confirmation'] = $claveHasher->hash($this->request->data['User']['password_confirmation']);

            if ($this->User->saveField('password',$this->request->data['User']['password'])) {
                
                $this->Session->setFlash(__('Clave ha sido cambiada'), 'msg', array('type' => 'success'));
                return $this->redirect(array('controller'=>'users','action' => 'index'));
            } else {
                
                $this->Session->setFlash(__('EL USUARIO NO SE PUDO MODIFICAR, INTENTE DE NUEVO.'), 'msg', array('type' => 'danger'));
                $this->request->data['User']['password'] = '';
                $this->request->data['User']['password_confirmation'] = '';
            }                
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->set('user', $this->User->read());
    }

    /*public function edit_clave2($id = null) {
        //Cambio de clave pidiendo clave anterior

        $this->User->id = $id;
        //pr($id);
        if ($this->User->exists() && $this->User->id != $this->Session->read('Auth.User.id')) {
            //throw new NotFoundException(__('Usuario incorrecto'));
            $this->Session->setFlash(__('No está permitido realizar esa acción!'));
            return $this->redirect(array('controller' => 'Inicios', 'action' => 'index2'));
        }
        // Instanciar otro encriptado de clave
        $claveHasher = new SimplePasswordHasher();

        $this->Auth->authorize = 'actions';
        if ($this->request->is('post') || $this->request->is('put')) {
            //obtener clave actual sin encriptar
            $cedula_formulario = substr($this->request->data['User']['username'],2);
            $clave_formulario = $this->request->data['User']['password'];
            //calcular el tamanio de la clave
            $tama_clave = strlen(utf8_decode($clave_formulario)); 
            //averiguar si la cedula esta en la clave
            $posicion_coincidencia = strpos($clave_formulario, $cedula_formulario);
            //pr($posicion_coincidencia);exit();
            // Encriptar clave anterior
            $this->request->data['User']['password_anterior'] = $claveHasher->hash($this->request->data['User']['password_anterior']);
            // OBTENER DATOS ANTES DE MODIFICARLOS
            $clave_antigua = $this->User->find('first', array('conditions' => array('User.id' => $id)));            
            // Si claves actual/anterior no coincide?
            if (strcmp($clave_antigua['User']['password'], $this->request->data['User']['password_anterior']) !== 0) {
                $this->request->data['User']['password_anterior'] = '';
                $this->request->data['User']['password'] = '';
                $this->request->data['User']['password_confirmation'] = '';
                $this->Session->setFlash(__('Clave anterior incorrecta!'));

                // Si la clave continene 12345678
            } elseif (strpos($clave_formulario, '123456') !== false) {
                unset($cedula_formulario);
                unset($clave_formulario);
                $this->Session->setFlash(__('Atencion! La clave no puede tener numeros consecutivos!'));
                return $this->redirect(array('controller' => 'users', 'action' => 'edit_clave2', $id));
            
                // Si la clave es menor de 8 caracteres
            } elseif($tama_clave < 8) {                
                unset($clave_formulario);
                unset($tama_clave);
                unset($posicion_coincidencia);
                $this->Session->setFlash(__('Atencion! La clave no debe ser inferior a 8 caracteres!'));
                return $this->redirect(array('controller' => 'users', 'action' => 'edit_clave2', $id));

                // Si la clave es la misma cedula???
            } elseif ($clave_formulario==$cedula_formulario) {
                unset($clave_formulario);
                unset($tama_clave);
                unset($posicion_coincidencia);
                $this->Session->setFlash(__('Atencion! La clave no puede ser la cedula!'));
                return $this->redirect(array('controller' => 'users', 'action' => 'edit_clave2', $id));

                // Si la cedula esta combinada con la clave???
            } elseif ($posicion_coincidencia !== false) {
                unset($clave_formulario);
                unset($tama_clave);
                unset($posicion_coincidencia);
                $this->Session->setFlash(__('Atencion! La clave no puede contener la cedula!'));
                return $this->redirect(array('controller' => 'users', 'action' => 'edit_clave2', $id));
            
                // Entonces la clave esta bien asi
            } else {
                // Encriptar de nuevo las claves
                $this->request->data['User']['password'] = $claveHasher->hash($this->request->data['User']['password']);
                $this->request->data['User']['password_confirmation'] = $claveHasher->hash($this->request->data['User']['password_confirmation']);

                if ($this->User->save($this->request->data)) {
                    // REGISTRO DE EVENTO EN LA BITACORA
                    $this->requestAction(array('controller' => 'eventos', 'action' => 'add'),
                        array('user_id' => $this->Session->read('Auth.User.id'),
                            'operacion' => 'CAMBIO-CLAVE',
                            'tarea' => 'CAMBIO DE CLAVE PROPIA DEL USUARIO',
                            'modulo' => 'edit_clave2',
                            'tabla' => 'users',
                            'id_tabla' => $id
                        ));
                    
                    $this->Session->setFlash(__('Clave ha sido cambiada, por favor inicie sesion nuevamente.'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'logout'));
                    //$this->redirect('../../unefa_ce');
                } else {
                    // REGISTRO DE EVENTO EN LA BITACORA
                    $this->requestAction(array('controller' => 'eventos', 'action' => 'add'),
                        array('user_id' => $this->Session->read('Auth.User.id'),
                            'operacion' => 'ERROR-CAMBIO-CLAVE',
                            'tarea' => 'ERROR EN CAMBIO DE CLAVE DEL PROPIO USUARIO DESDE USERS',
                            'modulo' => 'edit_clave2',
                            'tabla' => 'users',
                            'id_tabla' => $id
                        ));
                    
                    $this->Session->setFlash(__('EL USUARIO NO SE PUDO MODIFICAR, INTENTE DE NUEVO.'));
                    $this->request->data['User']['password_anterior'] = '';
                    $this->request->data['User']['password'] = '';
                    $this->request->data['User']['password_confirmation'] = '';
                }                
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);            
        }
        //$this->set('usuario', $this->request->data['User']['name']);
    }*/

}
