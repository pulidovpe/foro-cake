<?php //pr($foroTema); ?>
<div style="clear: both;">
	<div style="text-align: center;margin: 0 auto;width: 98%;">
		<!-- IR A INICIO - CATEGORIA -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
		<!-- IR AL SUBFORO DE DONDE VENIMOS -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".$this->Html->link(__($foro), array('controller' => 'foroTemas','action' => 'index',h($categoria),h($foroTema['ForoTema']['id_subforo']))); ?></span>
		<!-- EL TEMA ACTUAL -->
		<span style="float: left;font-weight: bold;font-size: 1em;"><?php echo "- >> ".h($foroTema['ForoTema']['titulo']); ?></span>
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
		<table>
			<tr>
				<th style="background-color: lightgray;">
					<span style="float: left;display: inline-block;font-size: 1em;">
						<?php echo h($usuario['User']['username']);?>
					</span>				
					<span style="float: left;display: inline-block;font-size: 1em;">
					</span>
				</th><th style="background-color: lightgray;">
					<span style="float: left;display: inline-block;font-size: 1em;">
						<?php echo h($foroTema['ForoTema']['created']); ?>
					</span>
				</th><th style="background-color: lightgray;">
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
					<span style='font-weight: bold;'>Mensajes:&nbsp;</span>
					<?php echo h($usuario['User']['mensajes']);?>
				</td>
				<td colspan="2" style="border-color: black;">
					<?php echo h($foroTema['ForoTema']['contenido']);?>
				</td>
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
					<span style='font-weight: bold;'>Mensajes:&nbsp;</span>
					<?php echo h($comenta['users']['mensajes']);?>
				</td>
				<td colspan="2">
					<?php echo h($comenta['comentario_foro']['comentario']);?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>

	</div>
</div>
<div style="clear: both;"> <!--  class="actions"> -->
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
