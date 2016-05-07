<?php
/**
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','bootstrap.min','jquery.toastmessage'));
		echo $this->Html->script(array('jquery.min','bootstrap.min','jquery.toastmessage','funciones','ckeditor/ckeditor','ckeditor/samples/js/sample'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->Html->link(
					$this->Html->image('titulo.jpg', array('alt' => 'BANNER', 'border' => '0', 'width' => '100%', 'height' => '150px')), '', array('target' => '', 'escape' => false),'http://quiensoy-pulidovpe.c9.io');
			?>
		</div>
		<div style="background: lightgray;margin: 0 auto;width: 98%">
			<article style="display: inline-block;text-align: left;">
				<ul>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link(__('Inicio'), array('controller' => 'foroCategorias', 'action' => 'index')); ?>
					</li>
					<?php if(($logged_in) && ($current_user['role']==1)): ?>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link('Administrar', array('controller' => 'users', 'action' => 'index')); ?>
					</li>
					<?php endif; ?>
					<li style="display: inline-block;text-decoration:none;">
						<?php echo $this->Html->link('Buscar', array('controller' => 'foroTemas', 'action' => 'buscar')); ?>
					</li>		
				</ul>
			</article>
			<article style="float: right;display: inline-block;text-align: right;">
				<?php if ($logged_in): ?>
					<?php if($current_user['username'] != 'Invitado'): ?>
					<li style='display: inline-block;text-decoration:none;'>
						<span><b style="color:red;"><?php echo $this->Html->link('Perfil', array('controller' => 'users', 'action' => 'view',h($current_user['id']))); ?></b></span>
					</li>
					<?php endif; ?>
					<li style='display: inline-block;text-decoration:none;'>
						<span><b style="color:red;"><?php echo $current_user['username']; ?></b></span>
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
			
		</div>
		<article style="clear: both;text-align: center;background: orange;margin: 0 auto;width: 98%">
			<span style="font-weight: bold;"><?php echo __('Foro (Pagina en construccion)'); ?></span>
		</article>
		<div id="content" style="font-size: 1em;margin: 0 auto;width: 98%">
		
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<article style="clear: both;text-align: center;background: orange;margin: 0 auto;width: 100%">
				<span style="font-weight: bold;"><?php echo __('Foro (Pagina en construccion)'); ?></span>
			</article>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>