<?php 
	/*echo "logged_in <br />";
	pr($logged_in);
	echo "current_user['role'] <br />";
	pr($current_user['role']);
	echo "Categoria <br />";
	pr($categoria);
	echo "subforo['ForoSubforo']['id'] <br />";
	pr($subforo['ForoSubforo']['id']);
	echo "forotemas <br />";
	pr($foroTemas);*/
?>
<div style="clear: both;">  
	<div style="text-align: center;margin: 0 auto;width: 98%;">	
		<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
			<th colspan="6" >
				<div style="text-align: center;">
					<!-- IR A INICIO - CATEGORIAS -->
					<span style="float: left;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__($categoria), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
					<!-- IR A UN FORO - FOROTEMAS -->
					<span style="float: left;font-weight: bold;font-size: 0.9em;"><?php echo "- -> ".$subforo['ForoSubforo']['subforo']; ?></span>					
				</div>
			</th>
		</tr>
		<tr>
			<th colspan="5" style="background-color: lightgray;">
				<?php if(($logged_in)&&($subforo['ForoSubforo']['id']>1)&&($current_user['username'] != 'Invitado')): ?>
					<?php if(isset($foroTema)): ?>
						<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$subforo['ForoSubforo']['id'])); ?></li>
					<?php else: ?>
						<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$foro)); ?></li>
					<?php endif; ?>
				<?php elseif(($logged_in)&&($current_user['role']<3)): ?>
					<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$foro)); ?></li>
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<th style="width: 40%;background: orange;"><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('activo'); ?></th>
			<th style="text-align: center;margin: 0 auto;background: orange;width: 20%;">
				<span style="font-size: 0.8em;">
					<?php echo __('- Autor - '); ?>
				</span>
			</th>
			<th style="text-align: center;margin: 0 auto;background: orange;width: 10%;">
				<span style="font-size: 0.8em;">
					<?php echo __('- Respuestas - '); ?>
				</span>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
			foreach ($foroTemas as $foroTema): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(__(h($foroTema['ForoTema']['titulo'])), array('action' => 'view',h($categoria),h($subforo['ForoSubforo']['subforo']),h($foroTema['ForoTema']['id']))); ?>			
				</td>
				<td><?php echo h($foroTema['ForoTema']['fecha']); ?>&nbsp;</td>
				<td><?php echo h($foroTema['ForoTema']['activo']); ?>&nbsp;</td>
				<td style="text-align: center;">
					<?php echo $foroTema['User']['username']; ?>
				</td>
				<td class="actions">
					<?php echo $foroTema['ForoTema']['comentarios']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
			<tr>
				<th colspan="5" style="background-color: lightgray;">
					<?php if(($logged_in)&&($subforo['ForoSubforo']['id']>1)&&($current_user['username'] != 'Invitado')): ?>
						<?php if(isset($foroTema)): ?>
							<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;">
								<?php 
									echo $this->Html->link(__('Publicar nuevo tema'), array(
										'action' => 'add',
										$categoria,
										$subforo['ForoSubforo']['subforo'],
										$subforo['ForoSubforo']['id']
									)); 
								?>
							</li>
						<?php else: ?>
							<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;">
								<?php 
									echo $this->Html->link(__('Publicar nuevo tema'), array(
										'action' => 'add',
										$categoria,
										$subforo['ForoSubforo']['subforo'],
										$foro
									)); 
								?>
							</li>
						<?php endif; ?>
					<?php elseif(($logged_in)&&($current_user['role']<3)): ?>
						<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$foro)); ?></li>
					<?php endif; ?>
				</th>
			</tr>
		</tbody>
		</table>
		<p>
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, 
				mostrando {:current} registros de {:count} en total, 
				empezando en el {:start}, terminando en {:end}')
				));
			?>
		</p>
		<div class="paging">
		<?php
			echo $this->Paginator->first(__('Primero', true), array(), null, array('class' => 'first disabled'));
			echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
			echo $this->Paginator->last(__('Último', true), array(), null, array('class' => 'last disabled'));
		?>
		</div>
	</div>
</div>