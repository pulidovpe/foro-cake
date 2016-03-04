<?php echo $this->html->charset();
/**
 *
 * PHP 5
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "Excelencia Educativa" ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','bootstrap.min','jquery.toastmessage'));
		echo $this->Html->script(array('jquery.min','bootstrap.min','jquery.toastmessage','funciones'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');


	?>
</head>
<!--<body class="lock-screen">-->
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->Html->link(
					$this->Html->image('titulo.jpg', array('alt' => 'BANNER', 'border' => '0', 'width' => '100%', 'height' => '150px')), '', array('target' => '', 'escape' => false));
			?>
			<!-- <h1>< ?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ? ></h1> -->
		</div>
		<div id="content">
			<div id="cargando">
	    	</div>
		<div id="content">
			<article style="display: inline-block;text-align: left;">
				<ul>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link(__('Inicio'), array('controller' => 'foroCategorias', 'action' => 'index')); ?>
					</li>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index')); ?>
					</li>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link('Buscar', array('controller' => 'users', 'action' => 'index')); ?>
					</li>		
				</ul>
			</article>
			<article style="float: right;display: inline-block;text-align: right;">
				<?php if ($logged_in): ?>
					<li style='display: inline-block;text-decoration:none;'>
						<span><b style="color:red;"><?php echo $current_user['nombre']; ?></b></span>
					</li>
					<li style='display: inline-block;text-decoration:none;'>
						<?php echo $this->Html->link('Desconectar', array('controller' => 'users', 'action' => 'logout')); ?>
					</li>
				<?php else: ?>
					<li style='display: inline-block;text-decoration:none;'>
						<?php echo $this->Html->link('Registrarse', array('controller' => 'users', 'action' => 'add')); ?>
					</li>
					<li style='display: inline-block;text-decoration:none;'>
						<?php echo $this->Html->link('Conectar', array('controller' => 'users', 'action' => 'login')); ?>
					</li>					
				<?php endif; ?>
			</article>

			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<p>
		<?php echo $cakeVersion; ?>
	</p>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
	
