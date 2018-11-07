<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2>Usuarios</h2>
		</div>

		<div class="table-responsive">
		
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col"><?= $this->Paginator->sort('id') ?></th>
						<th scope="col"><?= $this->Paginator->sort('email') ?></th>
						<th scope="col"><?= $this->Paginator->sort('password') ?></th>
						<th scope="col"><?= $this->Paginator->sort('created') ?></th>
						<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
						<th scope="col"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?= $this->Number->format($user->id) ?></td>
						<td><?= h($user->email) ?></td>
						<td><?= h($user->password) ?></td>
						<td><?= h($user->created) ?></td>
						<td><?= h($user->modified) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-info']) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary']) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id ], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-sm btn-danger']) ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers(['before' => '', 'after'=>'']) ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</div>
	</div>
</div>