<?php
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

		echo $this->Html->css(array('reset','cake.generic','bootstrap','bootstrap-modal','bootstrap-modal-bs3patch','aaaa'));
		echo $this->Html->script(array('jquery.min','bootstrap','bootstrap-modal','bootstrap-modalmanager'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');


	?>
	<!--script type="text/javascript">
		$(window).bind('onbeforeunload', function(){
			return 'Cierre la sesión por favor!.';
		});
	</script -->
</head>
<body >

	<div id="container">
		<div id="header">
			<?php echo $this->Html->link(
					$this->Html->image('fruits.jpg', array('alt' => 'BANNER', 'border' => '0', 'width' => '100%', 'height' => '150px')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>

			
		</div>
<div id="cargando">
     </div>
		<div id="content">

			<article style="text-align: right;">
				<?php if ($logged_in): ?>
					<li style='display: inline-block;text-decoration:none;'><span><b style="color:red;"><?php echo $current_user['name']; ?></b></span>
						<!--ul-->
							<li style='display: inline-block;text-decoration:none;'>
								<?php echo $this->Html->link('Cambiar clave', array('controller' => 'users', 'action' => 'edit_clave2', $current_user['id'])); ?>
							</li>
							<li style='display: inline-block;text-decoration:none;'>
								<?php echo $this->Html->link('Desconectar', array('controller' => 'users', 'action' => 'logout')); ?>
							</li>
				<?php else: ?>
							<li style='display: inline-block;text-decoration:none;'>
								<?php echo $this->Html->link('Conectar', array('controller' => 'users', 'action' => 'login')); ?>
							</li>
						<!--/ul-->
					</li>					
				<?php endif; ?>
			</article>


			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php
				/* echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
	