<div class="program">
	<div class="training-plan-header">
		<h3><a href="#" data-toggle="collapse" data-target="#plan-<?php echo $plan['TrainingPlan']['id']; ?>">
			<?php echo $plan['TrainingPlan']['title']; ?>
		</a></h3>
		
		<div class="training-plan-toggle">
			<a href="#" data-toggle="collapse" data-target="#plan-<?php echo $plan['TrainingPlan']['id']; ?>">
				<?php echo $this->TB->icon('minus'); ?>
			</a>
		</div>
	</div>
 
	<div class="training-plan-body collapse in" id="plan-<?php echo $plan['TrainingPlan']['id']; ?>">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Exercice</th>
					<th>Récup</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($plan['ExercisesTrainingPlan'] as $exercise) {
					echo $this->element('ExercisesTrainingPlans'.DS.'exercise', array('exercise' => $exercise));
				} ?>
			</tbody>
		</table>
	</div>
</div>