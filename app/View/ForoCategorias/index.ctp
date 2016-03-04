<div style="clear: both;">
	<span style="text-align: left;"><h3><?php echo __('Foro'); ?></h3></span>
	<div style="text-align: center;margin: 0 auto;width: 98%;">
		<?php //pr($subforos1); ?>
		<table cellpadding="0" cellspacing="0">
			<thead >
				<tr>
					<th colspan="2"><?php echo h($foroCategorias[0]['ForoCategoria']['categoria']);?>&nbsp;</td></th>
					<th>
						<span style="font-size: 0.8em;">
						<?php echo "Temas - Mensajes - Último mensaje" ?>
						</span>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<tbody>
					<?php foreach ($subforos1 as $foroSubforo): ?>
						<tr>
							<td colspan="2" width="80%">
								<?php echo $this->Html->link(h($foroSubforo['ForoSubforo']['subforo']), array('controller' => 'foroTemas','action' => 'index',h($foroSubforo['ForoSubforo']['id']))); ?><br />
								<span style="font-size: 0.8em;"><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?></span>
							</td>
							<td class="actions">
								<?php echo $foroSubforo['ForoSubforo']['temas']; ?>
								<!-- < ?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $foroSubforo['ForoSubforo']['id'])); ? >
								< ?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $foroSubforo['ForoSubforo']['id']), array(), __('Are you sure you want to delete # %s?', $foroSubforo['ForoSubforo']['id'])); ? > -->
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</tr>
				<thead>
					<tr>
						<th colspan="2"><?php echo h($foroCategorias[1]['ForoCategoria']['categoria']); ?>&nbsp;</th>
						<th>
							<span style="font-size: 0.8em;">
							<?php echo "Temas - Mensajes - Último mensaje" ?>
							</span>
						</th>
					</tr>
				</thead>
				<tr>
					<tbody>
					<?php foreach ($subforos2 as $foroSubforo): ?>
						<tr>
							<td colspan="2" width="80%">
								<?php echo $this->Html->link(h($foroSubforo['ForoSubforo']['subforo']), array('controller' => 'foroTemas','action' => 'index',h($foroSubforo['ForoSubforo']['id']))); ?><br />
								<span style="font-size: 0.8em;"><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?></span>
							</td>
							<td class="actions">
								<?php echo $foroSubforo['ForoSubforo']['temas']; ?>
								<!-- < ?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $foroSubforo['ForoSubforo']['id'])); ? >
								< ?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $foroSubforo['ForoSubforo']['id']), array(), __('Are you sure you want to delete # %s?', $foroSubforo['ForoSubforo']['id'])); ? > -->
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</tr>
				<thead>
					<tr>
						<?php if($logged_in): ?>
							<th colspan="2"><?php echo h($foroCategorias[2]['ForoCategoria']['categoria']); ?>&nbsp;</th>
							<th>
								<span style="font-size: 0.8em;">
								<?php echo "Temas - Mensajes - Último mensaje" ?>
								</span>
							</th>
						<?php endif; ?>&nbsp;</td>
					</tr>
				</thead>
			</tbody>
		</table>
	</div>
</div>

