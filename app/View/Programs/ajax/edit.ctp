<?php
/**
 * Successfully updated program ?
 */
if (!empty($updatedProgram)) {
	$date = $updatedProgram['Program']['effective_date'];
	$userName = $updatedProgram['User']['short_name'];
	$updatedRow = json_encode($this->element('Program'.DS.'user_program', array('program' => $updatedProgram)));
	$this->Js->buffer("
		$('#user-program-{$updatedProgram['Program']['id']}').replaceWith({$updatedRow});
		$('#usersList').masonry('reload');
	");
} else {
	$date = $this->data['Program']['effective_date'];
	$userName = $this->data['User']['short_name'];
}

/**
 * Blink alert box once
 */
$this->Js->buffer("
	$('#modalLayerBody .alert').fadeOut('fast').fadeIn('fast');
");

/**
 * Program Edit Form
 */
echo $this->Form->create('Program', array(
	'class' => 'form-inline',
	'inputDefaults' => array(
		'label' => false,
		'div' => false
	)
));
echo $this->Form->input('id');
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>
		<?php echo ucfirst($this->TimePaginator->formatDate($date)); ?> 
		<?php echo " pour " . $userName; ?>
	</h3>
</div>

<div class="modal-body" id="modalLayerBody">
	<?php echo $this->Session->flash(); ?>
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