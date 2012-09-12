<?php
/**
 * Successfully created program ?
 */
if (!empty($newProgram)) {
	if (!empty($newUser)) {
		$newUser = json_encode($this->element('Users'.DS.'program', array('user' => $newUser, 'date' => $date)));
		$this->Js->buffer("
			$('#usersList').append({$newUser});
		");
	} else {
		$newRow = json_encode($this->element('Program'.DS.'user_program', array('program' => $newProgram)));
		$this->Js->buffer("
			$('#user-{$newProgram['Program']['user_id']} tbody').append({$newRow});
		");
	}
	$this->Js->buffer("
		$('#usersList').masonry('reload');
	");
}

/**
 * Blink alert box once
 */
$this->Js->buffer("
	$('#modalLayerBody .alert').fadeOut('fast').fadeIn('fast');
");

/**
 * Program Add Form
 */
echo $this->Form->create('Program', array(
	'class' => 'form-inline',
	'inputDefaults' => array(
		'label' => false,
		'div' => false
	)
));
echo $this->Form->input('effective_date', array('type' => 'hidden', 'value' => $date));
if (!empty($user)) {
	echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['User']['id']));
}
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo ucfirst($this->TimePaginator->formatDate($date)); ?> 
		<?php if (!empty($user)) {
			echo " pour " . $user['User']['short_name'];
		} else {
			echo " : ajouter un athlète";
		}?>
	</h3>
</div>

<div class="modal-body" id="modalLayerBody">
	<?php echo $this->Session->flash(); ?>
	<?php if (empty($user)): ?>
		<?php echo $this->Form->input('user_id', array('label' => false, 'empty' => "-- Athlète --", 'class' => 'input-large')); ?>
		<br/>
	<?php endif; ?>
	<?php echo $this->Form->input('exercise_id', array('empty' => "-- Exercice --", 'class' => 'input-medium')); ?>
	<?php echo $this->Form->input('sets', array('placeholder' => "Séries", 'class' => 'input-small', 'min' => 1)); ?> x 
	<?php echo $this->Form->input('reps', array('placeholder' => "Répétitions", 'class' => 'input-small', 'min' => 1)); ?> @ 
	<?php echo $this->Form->input('weight', array('placeholder' => "Kg", 'class' => 'input-small', 'min' => 1)); ?><br/>
	<?php echo $this->Form->input('break', array('empty' => "-- Récupération --", 'class' => 'input-medium', 'options' => $this->Programs->breakOptions)); ?> 
</div>

<div class="modal-footer">
	<?php echo $this->Js->submit("Enregistrer", array(
		'update' => '#modalLayer',
		'class' => 'btn btn-success btn-large',
	)); ?>
</div>

<?php echo $this->Form->end(); ?> 