<?php //pr($subforos); ?>
<div style="clear: both;">
	<div style="text-align: center;margin: 0 auto;width: 98%;">
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
					<?php $i=0; ?>
					<?php foreach ($subforos as $foroSubforo): ?>
						<tr>
							<?php if($subforos[$i]['ForoSubforo']['id_foro_categoria']==1): ?>
								<td colspan="2" width="80%">
									<?php echo $this->Html->link(h($foroSubforo['ForoSubforo']['subforo']), array('controller' => 'foroTemas','action' => 'index',h($foroCategorias[0]['ForoCategoria']['categoria']),h($foroSubforo['ForoSubforo']['id']))); ?><br />
									<span style="font-size: 0.8em;"><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?></span>
								</td>
								<td class="actions">
									<?php echo $foroSubforo['ForoSubforo']['temas']; ?>
								</td>
							<?php
								endif;
								$i++; 
							?>
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
					<?php $i=0;
						foreach ($subforos as $foroSubforo): ?>						
						<tr>
							<?php if($subforos[$i]['ForoSubforo']['id_foro_categoria']==2): ?>
								<td colspan="2" width="80%">
									<?php echo $this->Html->link(h($foroSubforo['ForoSubforo']['subforo']), array('controller' => 'foroTemas','action' => 'index',h($foroCategorias[1]['ForoCategoria']['categoria']),h($foroSubforo['ForoSubforo']['id']))); ?><br />
									<span style="font-size: 0.8em;"><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?></span>
								</td>
								<td class="actions">
									<?php echo $foroSubforo['ForoSubforo']['temas']; ?>
								</td>
							<?php
								endif;
								$i++; 
							?>
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
				<tr>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($subforos as $foroSubforo): ?>
						<tr>
							<?php if($subforos[$i]['ForoSubforo']['id_foro_categoria']==3): ?>
								<td colspan="2" width="80%">
									<?php echo $this->Html->link(h($foroSubforo['ForoSubforo']['subforo']), array('controller' => 'foroTemas','action' => 'index',h($foroCategorias[2]['ForoCategoria']['categoria']),h($foroSubforo['ForoSubforo']['id']))); ?><br />
									<span style="font-size: 0.8em;"><?php echo h($foroSubforo['ForoSubforo']['descripcion']); ?></span>
								</td>
								<td class="actions">
									<?php echo $foroSubforo['ForoSubforo']['temas']; ?>
								</td>
							<?php
								endif;
								$i++; 
							?>							
						</tr>
					<?php endforeach; ?>
					</tbody>
				</tr>
			</tbody>
		</table>
	</div>
</div>