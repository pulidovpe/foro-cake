<?php 
	/*echo "logged_in <br />";
	pr($logged_in);
	echo "current_user['role'] <br />";
	pr($current_user['role']);
	echo "Categoria <br />";
	pr($categoria);
	echo "subforo['ForoSubforo']['id'] <br />";
	pr($subforo['ForoSubforo']['id']);
	echo "Foro <br />";
	echo "comentarios <br />";
	pr($comentarios);*/
?>
<div style="clear: both;">  
	<div style="text-align: center;margin: 0 auto;width: 98%;">	
		<table cellpadding="0" cellspacing="0">
		<thead>
		
		<tr>
			<th style="width: 40%;background: orange;"><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('activo'); ?></th>
			<th style="text-align: center;margin: 0 auto;background: orange;width: 30%;">
				<span style="font-size: 0.8em;">
					
				</span>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
			foreach ($comentarios as $comentario): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(__(h($comentario['ComentarioForo']['titulo'])), array('action' => 'view',h($categoria),h($subforo['ForoSubforo']['subforo']),h($comentario['ComentarioForo']['id']))); ?>			
				</td>
				<td><?php echo h($comentario['ComentarioForo']['created']); ?>&nbsp;</td>
				<td><?php echo h($comentario['ComentarioForo']['activo']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $comentario['ComentarioForo']['comentarios']; ?>
				</td>
			</tr>
		<?php endforeach; ?>

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