<?php
$this->set('title_for_layout', "Programme de {$user['User']['short_name']}");

$this->Html->script('user_programs', array('inline' => false));
$this->Html->script('jquery.lastupdate', array('inline' => false));
$this->Js->buffer("
	$('dl').lastupdate();
");
?>

<div class="programs index">
	<h1>Programme de <?php echo $user['User']['short_name']; ?></h1>

	<?php if (empty($programs)): ?>
		<div class="alert">
			Pas encore d'exercice programmé.
		</div>
	<?php else: ?>
		<?php echo $this->element('Program'.DS.'user_programs_actions', compact('user')); ?> 
		<br/>
	<?php endif; ?>

	<h4>Nouvel exercice :</h4>
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
		'value' => !empty($user['Program'][0]['effective_date']) ? $user['Program'][0]['effective_date'] : date('Y-m-d'),
		'class' => 'input-medium'
	)); ?> 
	<?php echo $this->Form->input('exercise_id', array(
		'selected' => !empty($user['Program'][0]['exercise_id']) ? $user['Program'][0]['exercise_id'] : null,
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

	<?php if (!empty($programs)): $currentDate = false; ?>
		<dl class="dl-horizontal">
		<?php foreach ($programs as $program):
			$label = $program['Exercise']['full_name'];
			if (!empty($program['Program']['sets'])) {
				$label .= " : " . $program['Program']['sets'] . " x";
			}
			if (!empty($program['Program']['reps'])) {
				$label .= " " . $program['Program']['reps'];
			}
			if (!empty($program['Program']['weight'])) {
				$label .= " @ " . $program['Program']['weight'] . " kg";
			}
			if (!is_null($program['Program']['break'])) {
				$label .= " (" . $this->Programs->breakTime($program['Program']['break']) . ")";
			}
		?>
			<dt><?php if ($currentDate != $program['Program']['effective_date']) echo $this->Time->format('d-m-Y', $program['Program']['effective_date']) . " :"; ?></dt>
			<dd id="id-<?php echo $program['Program']['id']; ?>">
				<?php echo $label; ?>
				<span class="actions">
					<?php echo $this->Html->link(
						"{$this->TB->icon('pencil')}", 
						array('action' => 'edit', $program['Program']['id']), 
						array('escape' => false, 'title' => "Modifier l'exercice")
					); ?>
					<?php echo $this->Form->postLink(
						"{$this->TB->icon('trash')}", 
						array('action' => 'delete', $program['Program']['id']), 
						array('escape' => false, 'title' => "Supprimer l'exercice"), 
						"Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"
					); ?> 
				</span>
			</dd>
		<?php
		$currentDate = $program['Program']['effective_date'];
		endforeach; ?>
		</dl>
	<?php endif; ?>

	<?php echo $this->element('Program'.DS.'user_programs_actions', compact('user')); ?> 
</div>