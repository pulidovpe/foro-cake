<?php 
/*echo "comentarios <br />";
pr($comentarios[0]);
echo "usuario <br />";
pr($usuario);
echo "foroTema <br />";
pr($foroTema);*/
?>
<div style="clear: both;">
	<div style="text-align: center;margin: 0 auto;width: 98%;">
		<!-- IR A INICIO - CATEGORIA -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
		<!-- IR AL SUBFORO DE DONDE VENIMOS -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__($foro), array('controller' => 'foroTemas','action' => 'index',h($categoria),h($foroTema['ForoTema']['id_subforo']))); ?></span>
		<!-- EL TEMA ACTUAL -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".h($foroTema['ForoTema']['titulo']); ?></span>
		<table>
			<tr>
				<th colspan="3" style="background-color: lightgray;">
					<?php if ($logged_in): ?>
						<span style="float: right;font-weight: bold;font-size: 1em;">
							<?php echo $this->Html->link(__('Responder al Tema'), array(
								'controller' => 'comentarioForos', 'action' => 'add',
								h($categoria),
								h($foroTema['ForoTema']['titulo']),
								h($foroTema['ForoTema']['id_subforo']),
								h($foroTema['ForoTema']['id'])
							)); ?>
						</span>
					<?php endif; ?>
				</th>
			</tr>
			<tr>
				<th style="background-color: orange;">
					<span style="float: left;display: inline-block;font-size: 1em;">
						<?php echo h($usuario['User']['username']);?>
					</span>				
					<span style="float: left;display: inline-block;font-size: 1em;">
					</span>
				</th><th style="background-color: orange;">
					<span style="float: left;display: inline-block;font-size: 1em;">
						<?php echo h($foroTema['ForoTema']['created']); ?>
					</span>
				</th><th style="background-color: orange;">
					<span style="float: right;font-size: 1em;">
						<?php echo h($foroTema['ForoTema']['created']); ?>
					</span>
				</th>
			</tr>
			<tr class="altrow">
				<td width="20%" style="border-color: black;">
					<div style="background-color: gray;width: 100px;height: 100px;">
						<?php echo h($usuario['User']['avatar']);?>
					</div>
					<span style="font-weight: bold;">
						<?php
							if(h($usuario['User']['role'])==1):
								echo $op_role = 'Administrador';
							elseif(h($usuario['User']['role'])==2):
								echo $op_role = 'Moderador';
							elseif(h($usuario['User']['role'])==3):
								echo $op_role = 'Usuario';
							endif;
						?>
					</span><br />
					<span style='font-weight: bold;'>Desde:&nbsp;</span>
					<?php echo h($usuario['User']['fecharegistro']);?><br />
					<span style='font-weight: bold;'>Temas:&nbsp;</span>
					<?php echo h($usuario['User']['temas']);?><br />
					<span style='font-weight: bold;'>Comentarios:&nbsp;</span>
					<?php echo h($usuario['User']['comentarios']);?>
				</td>
				<td colspan="2" style="border-color: black;">
					<?php echo nl2br(h($foroTema['ForoTema']['contenido']));?>
					<br /><br /><hr />
					<?php echo h($usuario['User']['firma']);?>
				</td>
			</tr>
			<tr>
				<th colspan="3" style="background-color: orange;">
					<?php if ($logged_in): ?>
						<?php
							switch (h($current_user['role'])) {
								case 1:
									echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
									echo $this->Html->link(__('| Eliminar |'), array(
										'controller' => 'foroTemas', 'action' => 'delete',
										h($foroTema['ForoTema']['id'])
									));
									echo "</span>";
									
								case 2:
									echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
									echo $this->Html->link(__('| Moderar |'), array(
										'controller' => 'foroTemas', 
										'action' => 'edit',
										h($categoria),
										h($foroTema['ForoTema']['id_subforo']),
										h($foroTema['ForoTema']['id'])
									));
									echo "</span>";
									break;
								case 3:
									if(h($usuario['User']['id'])==$current_user['id']):
										echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
										echo $this->Html->link(__('| Editar |'), array(
											'controller' => 'foroTemas', 
											'action' => 'edit',
											h($categoria),
											h($foroTema['ForoTema']['id_subforo']),
											h($foroTema['ForoTema']['id'])
										));
										echo "</span>";
									endif;
									break;								
							}
						?>		
					<?php endif; ?>
				</th>
			</tr>
			<?php 
				$i = 0;
				foreach ($comentarios as $comenta):  
					$class = null;
					if ($i++ %2 == 0) {
						$class = ' class="altrow"';
					}
					//Para cambiar la clase segun el tr
			?>
			<tr<?php echo $class; ?>>
				<td>
					<span style="font-weight: bold;"><?php echo h($comenta['users']['username']);?></span><br />
					<div style="background-color: gray;width: 100px;height: 100px;">
						<?php echo h($comenta['users']['avatar']);?>
					</div>
					<span style="font-weight: bold;">
						<?php
							if(($comenta['users']['role'])==1):
								echo $op_role = 'Administrador';
							elseif(($comenta['users']['role'])==2):
								echo $op_role = 'Moderador';
							elseif(($comenta['users']['role'])==3):
								echo $op_role = 'Usuario';
							endif;
						?>
					</span><br />
					<span style='font-weight: bold;'>Desde:&nbsp;</span>
					<?php echo h($comenta['users']['fecharegistro']);?><br />
					<span style='font-weight: bold;'>Temas:&nbsp;</span>
					<?php echo h($comenta['users']['temas']);?><br />
					<span style='font-weight: bold;'>Comentarios:&nbsp;</span>
					<?php echo h($comenta['users']['comentarios']);?>
				</td>
				<td colspan="2">
					<?php echo nl2br(h($comenta['comentario_foro']['comentario']));?>
					<br /><br /><hr />
					<?php echo h($usuario['User']['firma']);?>
				</td>
			</tr>
			<tr>
				<th colspan="3" style="background-color: lightgray;">
					<?php if ($logged_in): ?>
						<?php
							switch (h($current_user['role'])) {
								case 1:
									echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
									echo $this->Html->link(__('| Eliminar |'), array(
										'controller' => 'comentarioForos', 'action' => 'delete',
										h($comenta['comentario_foro']['id'])
									));
									echo "</span>";
									
								case 2:
									echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
									echo $this->Html->link(__('| Moderar |'), array(
										'controller' => 'comentarioForos', 
										'action' => 'edit',
										h($categoria),
										h($comenta['comentario_foro']['id_tema']),
										h($comenta['comentario_foro']['id'])
									));
									echo "</span>";
									break;
								case 3:
									if(h($comenta['users']['id'])==$current_user['id']):
										echo "<span style='float: right;display: inline-block;font-size: 0.9em;'>";
										echo $this->Html->link(__('| Editar |'), array(
											'controller' => 'comentarioForos', 
											'action' => 'edit',
											h($categoria),
											h($comenta['comentario_foro']['id_tema']),
											h($comenta['comentario_foro']['id'])
										));
										echo "</span>";
									endif;
									break;								
							}
							/*echo "comenta[users][id]: ".h($comenta['users']['id']). "<br />";
							echo "current_user[id]: ".$current_user['id'];*/
						?>		
					<?php endif; ?>
				</th>
			</tr>
			<?php endforeach; ?>
			<tr>
				<th colspan="3" style="background-color: lightgray;">
					<?php if ($logged_in): ?>
						<span style="float: right;font-weight: bold;font-size: 1em;">
							<?php echo $this->Html->link(__('Responder al Tema'), array(
								'controller' => 'comentarioForos', 'action' => 'add',
								h($categoria),
								h($foroTema['ForoTema']['titulo']),
								h($foroTema['ForoTema']['id_subforo']),
								h($foroTema['ForoTema']['id'])
							)); ?>
						</span>
					<?php endif; ?>
				</th>
			</tr>
		</table>

	</div>
</div>
<div style="clear: both;"> <!--  class="actions"> -->
	<!-- <p>
		< ?php
			echo $this->Paginator->counter(array(
			'format' => __('Página {:page} de {:pages}, 
			mostrando {:current} registros de {:count} en total, 
			empezando en el {:start}, terminando en {:end}')
			));
		? >
	</p> -->
	<div class="paging">
	<!-- < ?php
		echo $this->Paginator->first(__('Primero', true), array(), null, array('class' => 'first disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(__('Último', true), array(), null, array('class' => 'last disabled'));
	? > -->
	</div>
</div>
