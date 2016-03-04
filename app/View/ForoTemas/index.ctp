<?php //pr($subforo); ?>
<div>  <!-- class="foroTemas index"> -->
	<h2><?php echo __('Foro Temas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th colspan="6" >

			<div style="text-align: center;margin: 0 auto;width: 98%;">
				<span style="float: left;font-weight: bold;font-size: 1.1em;"><?php echo $this->Html->link(__('Inicio'), array('controller' => 'foroCategorias', 'action' => 'index')); ?></span>
				<span style="float: left;font-weight: bold;font-size: 1.1em;"><?php echo "- -> ".$subforo['ForoSubforo']['subforo']; ?></span>
				<!-- <span style="float: left;font-weight: bold;font-size: 1.1em;">< ?php echo "- -> ".h($foroTema['0']['ForoTema']['titulo']); ? ></span> -->
				<?php if($logged_in): ?>
					<?php if(isset($foroTema)): ?>
						<li style="display: inline-block;text-decoration:none;"><?php echo $this->Html->link(__('Publicar Tema'), array('action' => 'add',$foroTema['0']['ForoTema']['id_subforo'])); ?></li>
					<?php else: ?>
						<li style="display: inline-block;text-decoration:none;"><?php echo $this->Html->link(__('Nuevo Tema'), array('action' => 'add',$foro)); ?></li>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</th>
	</tr>
	<tr>
			<!-- <th>< ?php echo $this->Paginator->sort('id'); ? ></th>
			<th>< ?php echo $this->Paginator->sort('id_subforo'); ? ></th> -->
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<!-- <th>< ?php echo $this->Paginator->sort('contenido'); ? ></th> -->
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<!-- <th>< ?php echo $this->Paginator->sort('id_usuario'); ? ></th> -->
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions">
				<span style="font-size: 0.8em;">
					<?php echo __('Respuestas - Vistas - Último mensaje'); ?>
				</span>
			</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($foroTemas as $foroTema): ?>
	<tr>
		<!-- <td>< ?php echo h($foroTema['ForoTema']['id']); ? >&nbsp;</td>
		<td>< ?php echo h($foroTema['ForoTema']['id_subforo']); ? >&nbsp;</td> -->
		<td>
			<?php echo $this->Html->link(__(h($foroTema['ForoTema']['titulo'])), array('action' => 'view', $foroTema['ForoTema']['id'],$subforo['ForoSubforo']['subforo'])); ?>			
		</td>
		<!-- <td>< ?php echo h($foroTema['ForoTema']['titulo']); ? >&nbsp;</td> -->
		<!-- <td>< ?php echo h($foroTema['ForoTema']['contenido']); ? >&nbsp;</td> -->
		<td><?php echo h($foroTema['ForoTema']['fecha']); ?>&nbsp;</td>
		<!-- <td>< ?php echo h($foroTema['ForoTema']['id_usuario']); ? >&nbsp;</td> -->
		<td><?php echo h($foroTema['ForoTema']['activo']); ?>&nbsp;</td>
		<td><?php echo h($foroTema['ForoTema']['created']); ?>&nbsp;</td>
		<td><?php echo h($foroTema['ForoTema']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<!-- < ?php echo $this->Html->link(__('View'), array('action' => 'view', $foroTema['ForoTema']['id'])); ? >
			< ?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $foroTema['ForoTema']['id'])); ? >
			< ?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $foroTema['ForoTema']['id']), array(), __('Are you sure you want to delete # %s?', $foroTema['ForoTema']['id'])); ? > -->
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<!-- <div class="actions">
	<h3>< ?php echo __('Actions'); ? ></h3>
	<ul>	
		
	</ul>
</div> -->
