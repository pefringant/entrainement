<?php
$this->set('title_for_layout', "Programmes types");
?>

<div class="trainingPlans index">
	<h1>Programmes types</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('title', "Titre"); ?></th>
				<th class="actions">Actions</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($trainingPlans as $trainingPlan): ?>
			<tr id="id-<?php echo $trainingPlan['TrainingPlan']['id']; ?>">
				<td><strong><?php echo h($trainingPlan['TrainingPlan']['title']); ?></strong></td>
				<td class="actions">
					<?php echo $this->Html->link("{$this->TB->icon('pencil', 'white')} Modifier", array('action' => 'edit', $trainingPlan['TrainingPlan']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $trainingPlan['TrainingPlan']['id']), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement ce programme ?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php echo $this->element('Pagination'.DS.'numbers'); ?> 

	<div class="actions">
		<?php
		$addIcon = $this->TB->icon('plus', 'white');
		echo $this->Html->link("$addIcon Ajouter un programme type", array('action' => 'add'), array(
			'class' => 'btn btn-success btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>