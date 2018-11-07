<?php
/**
  * @var \App\View\AppView $this
  */
?>
  
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Crear usuario</h2>
		</div>
		<?= $this->Form->create($user) ?>
	    
		<fieldset>
			<?php
				echo $this->Form->control('email');
				echo $this->Form->control('password');
			?>
		</fieldset>
		<?= $this->Form->button(__('Submit')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>