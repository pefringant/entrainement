<?php
$this->set('title_for_layout', "Programme de {$user['User']['short_name']}");
?>


<div class="programs form">
	<h1>Programme de <?php echo $user['User']['short_name']; ?></h1>

	<?php if (empty($programs)): ?>
		<div class="alert">
			Pas encore d'exercice programmé.
		</div>
	<?php else: ?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Exercice</th>
				<th>Récupération</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($programs as $program):
			$label = $this->Html->tag('strong', $program['Exercise']['full_name']);
			if (!empty($program['Program']['sets'])) {
				$label .= " : " . $program['Program']['sets'] . " x";
			}
			if (!empty($program['Program']['reps'])) {
				$label .= " " . $program['Program']['reps'];
			}
			if (!empty($program['Program']['weight'])) {
				$label .= " @ " . $program['Program']['weight'] . " kg";
			}
		?>
			<tr>
				<td><?php echo ucfirst($this->TimePaginator->formatDate($program['Program']['effective_date'])); ?></td>
				<td><?php echo $label; ?></td>
				<td><?php echo $this->Programs->breakTime($program['Program']['break']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link("{$this->TB->icon('pencil', 'white')} Modifier", array('action' => 'edit', $program['Program']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $program['Program']['id']), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>

	<h3>Nouvel exercice :</h3>
	<?php echo $this->Form->create('Program', array(
		'class' => 'form-inline well',
		'inputDefaults' => array(
			'label' => false,
			'div' => false
		)
	)); ?>
	<?php echo $this->Form->input('user_id', array(
		'type' => 'hidden', 
		'value' => $user['User']['id']
	)); ?>
	<?php echo $this->Form->date('effective_date', array(
		'value' => date('Y-m-d'),
		'class' => 'input-medium'
	)); ?> 
	<?php echo $this->Form->input('exercise_id', array(
		'empty' => "-- Exercice --", 
		'class' => 'input-medium'
	)); ?> : 
	<?php echo $this->Form->input('sets', array(
		'placeholder' => "Séries", 
		'class' => 'input-small', 
		'min' => 1
	)); ?> x 
	<?php echo $this->Form->input('reps', array(
		'placeholder' => "Répétitions", 
		'class' => 'input-small', 
		'min' => 1
	)); ?> @ 
	<?php echo $this->Form->input('weight', array(
		'placeholder' => "Kg", 
		'class' => 'input-small', 
		'min' => 1
	)); ?> 
	<?php echo $this->Form->input('break', array(
		'empty' => "-- Récupération --", 
		'class' => 'input-medium', 
		'options' => $this->Programs->breakOptions
	)); ?> 
	<?php echo $this->Form->submit("Ajouter", array(
		'div' => false,
		'class' => 'btn btn-success'
	)); ?> 
	<?php echo $this->Form->end(); ?>

	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('list')} Liste des athlètes", array('controller' => 'users', 'action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>