<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<?= $this->Html->link('Comisiones', ['controller'=> '/'], ['class' =>'navbar-brand']); ?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Usuarios
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <?= $this->Html->link('Ver', ['controller' => 'users', 'action'=> 'index'], ['class'=>'dropdown-item']); ?>
				  <?= $this->Html->link('Agregar', ['controller' => 'users', 'action'=> 'add'], ['class'=>'dropdown-item']); ?>
				</div>
			      </li>
			<li class="nav-item">
				<?= $this->Html->link('Reporte', ['controller' => 'SalesOrders', 'action'=> 'search'], ['class'=>'nav-link']); ?> 
			</li>
			<li class="nav-item">
				<?= $this->Html->link('Salir', ['controller' => 'users', 'action'=> 'logout'], ['class'=>'nav-link']); ?> 
			</li>
		</ul>

		
	
	</div>
    </nav>