<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array('Js' => array('Jquery'));

	public $components = array(
		'RequestHandler',
		'Session',
		'Cookie',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'foroCategorias', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'foroCategorias', 'action' => 'index'),
			'loginError' => 'Usuario o contraseña incorrecta.',
			'authError' => 'Debe iniciar sesion primero',
			'userScope' =>  array('User.active = 1'),
			'authorize' => array('Controller') 
			/*'authenticate' => array(
				'Form' => array(
					'userModel' => 'Usuario',
					'fields' => array(
						'username' => 'nickname',
						'password' => 'password'
					),
					'passwordHasher' => 'Blowfish'
				)
			)*/
		)
	);
	
	public function isAuthorized($user) {
		// Un usuario debe estar activo para realizar cualquier accion
		if ((isset($user['activo'])) && ($user['activo']=='S') && ($this->Session->started())) {
			return true;
		}
		/*$this->Auth->logout();
		$this->redirect(array('controller' => 'users', 'action' => 'login'));*/
		// Negado por defecto false
		return false;
	}
	
	public function beforeFilter() {
		$this->Auth->allow('login', 'logout', 'add');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}
}
