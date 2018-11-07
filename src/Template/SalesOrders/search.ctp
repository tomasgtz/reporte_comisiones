
<div class="row">
	<div class="col-md-3 col-md-offset-3">
		<div class="page-header">
			<h3><?= __('Generar reporte de comisiones') ?></h3>
			<h4><?= __('Seleccionar agente') ?></h4>
		</div>
		
    <?= $this->Form->create($this, ['type' => 'post', 'url' => '/salesorders/results']); ?>
	
	<fieldset>
			
			<?= $this->Form->control('agente', ['options' => $agentes]); ?>
			<?= $this->Form->control('status', ['options' => $status]); ?>
			
		</fieldset>
		<?= $this->Form->button('Buscar') ?>
    
    <?= $this->Form->end(); ?>
    
</div>