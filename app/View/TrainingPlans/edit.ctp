<?php
$this->set('title_for_layout', "Modifier un programme type");

$this->Html->script('exercises_training_plans', array('inline' => false));
$this->Html->script('jquery.lastupdate', array('inline' => false));
$this->Js->buffer("
	$('ol.training-plan-exercises').lastupdate();
");
?>
<div class="trainingPlans form">
	<h1>Programme "<?php echo $this->request->data['TrainingPlan']['title']; ?>"</h1>

	<?php echo $this->Form->create('TrainingPlan', array(
		'class' => 'form-inline well',
		'inputDefaults' => array(
			'div' => false
		)
	)); ?>
	<?php echo $this->Form->input('id'); ?> 
	<?php echo $this->Form->input('title', array(
		'label' => "<b>Titre :</b>",
		'class' => 'input-large', 
	)); ?> 
	<?php echo $this->Form->submit("Modifier", array(
		'div' => false,
		'class' => 'btn btn-success'
	)); ?> 
	<?php echo $this->Form->end(); ?>


	<h4>Nouvel exercice :</h4>
	<?php echo $this->Form->create('ExercisesTrainingPlan', array(
		'url' => array('controller' => 'exercises_training_plans', 'action' => 'add'),
		'class' => 'form-inline well',
		'inputDefaults' => array(
			'label' => false,
			'div' => false
		)
	)); ?>
	<?php echo $this->Form->input('training_plan_id', array(
		'type' => 'hidden', 
		'value' => $this->Form->value('TrainingPlan.id')
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
	)); ?> 
	<?php echo $this->Form->input('description', array(
		'type' => 'text',
		'placeholder' => "Précisions", 
		'class' => 'input-large', 
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


	<?php if (!empty($plans)): ?>
		<h2>Exercices du programme</h2>
		<ol class="training-plan-exercises">
		<?php foreach ($plans as $plan):
			$label = $this->Html->tag('strong', $plan['Exercise']['full_name']);
			if (!empty($plan['ExercisesTrainingPlan']['sets'])) {
				$label .= " : " . $plan['ExercisesTrainingPlan']['sets'] . " séries";
			}
			if (!empty($plan['ExercisesTrainingPlan']['reps'])) {
				$label .= " de " . $plan['ExercisesTrainingPlan']['reps'] . " répétitions";
			}
			if (!empty($plan['ExercisesTrainingPlan']['description'])) {
				$label .= ", " . $plan['ExercisesTrainingPlan']['description'];
			}
			if (!is_null($plan['ExercisesTrainingPlan']['break'])) {
				$label .= " (" . $this->Programs->breakTime($plan['ExercisesTrainingPlan']['break']) . " de récup)";
			}
		?>
			<li id="id-<?php echo $plan['ExercisesTrainingPlan']['id']; ?>">
				<?php echo $label; ?>
				<span class="actions">
					<?php echo $this->Html->link(
						"{$this->TB->icon('pencil')}", 
						array('controller' => 'exercises_training_plans', 'action' => 'edit', $plan['ExercisesTrainingPlan']['id']), 
						array('escape' => false, 'title' => "Modifier l'exercice")
					); ?>
					<?php echo $this->Form->postLink(
						"{$this->TB->icon('trash')}", 
						array('controller' => 'exercises_training_plans', 'action' => 'delete', $plan['ExercisesTrainingPlan']['id']), 
						array('escape' => false, 'title' => "Supprimer l'exercice"), 
						"Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"
					); ?> 
				</span>
			</li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>


	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('book')} Liste des programmes types", array('action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>