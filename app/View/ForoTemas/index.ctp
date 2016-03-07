<?php //pr($subforo); ?>
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
					<!-- <span style="float: left;font-weight: bold;font-size: 1.0.9em;">< ?php echo "- -> ".h($foroTema['0']['ForoTema']['titulo']); ? ></span> -->
					<?php if($logged_in): ?>
						<?php if(isset($foroTema)): ?>
							<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$subforo['ForoSubforo']['id'])); ?></li>
						<?php else: ?>
							<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$foro)); ?></li>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</th>
		</tr>
		<tr>
			<th style="width: 40%"><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th class="actions"  style="width: 30%">
				<span style="font-size: 0.9em;">
					<?php echo __('Respuestas - Visitas - Último mensaje'); ?>
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
				<td class="actions">

				</td>
			</tr>
		<?php endforeach; ?>
			<tr>
				<th colspan="6" >
					<div style="text-align: center;">
						<?php if($logged_in): ?>
							<?php if(isset($foroTema)): ?>
								<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$subforo['ForoSubforo']['id'])); ?></li>
							<?php else: ?>
								<li style="float: right;display: inline-block;font-weight: bold;font-size: 0.9em;"><?php echo $this->Html->link(__('Publicar nuevo tema'), array('action' => 'add',$categoria,$subforo['ForoSubforo']['subforo'],$foro)); ?></li>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</th>
			</tr>
		</tbody>
		</table>
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>
		</p>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</div>
</div>