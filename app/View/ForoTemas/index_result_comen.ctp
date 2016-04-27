<?php 
	/*echo "logged_in <br />";
	pr($logged_in);
	echo "current_user['role'] <br />";
	pr($current_user['role']);
	echo "Categoria <br />";
	pr($categorias);
	echo "subforos <br />";
	pr($subforos);
	echo "id_tema <br />";
	pr($id_tema);
	echo "comentarios <br />";
	pr($comentarios);*/
?>
<div style="clear: both;">  
	<div style="text-align: center;margin: 0 auto;width: 98%;">	
		<table cellpadding="0" cellspacing="0">
		<thead>
		
		<tr>
			<th style="width: 35%;background: orange;"><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th style="background: orange;"><?php echo $this->Paginator->sort('activo'); ?></th>
			<th style="text-align: center;margin: 0 auto;background: orange;width: 10%;">
				<span style="font-size: 0.8em;">
					<?php echo __('- Autor - '); ?>
				</span>
			</th>
			<th style="text-align: center;margin: 0 auto;background: orange;width: 25%;">
				<span style="font-size: 0.8em;">
					<?php echo __('- Texto encontrado - '); ?>
				</span>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
			foreach ($comentarios as $comentario): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(__(h($comentario['ComentarioForo']['titulo'])), array('action' => 'view',h($categorias['ForoCategoria']['categoria']),h($subforos['ForoSubforo']['subforo']),h($id_tema))); ?>
				</td>
				<td><?php echo h($comentario['ComentarioForo']['created']); ?>&nbsp;</td>
				<td><?php echo h($comentario['ComentarioForo']['activo']); ?>&nbsp;</td>
				<td style="text-align: center;">
					<?php echo $comentario['User']['username']; ?>
				</td>
				<td class="actions" style="height: 75px;text-align: left;">
					<?php echo substr($comentario['ComentarioForo']['comentario'],0,100); ?>
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