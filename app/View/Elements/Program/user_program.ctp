<?php
if (isset($program['Program']['Exercise'])) {
	$exercise = $program['Program']['Exercise'];
} elseif (isset($program['Exercise'])) {
	$exercise = $program['Exercise'];
}

$label = $exercise['short_name'];
$title = $exercise['full_name'];
$desc = "<em>Pas de précisions.</em>";

if (!empty($program['Program']['sets'])) {
	$label .= " : " . $program['Program']['sets'] . " x";
	$desc = $this->Html->tag('strong', $program['Program']['sets']) . " série";
	if ($program['Program']['sets'] > 1) $desc .= "s";
}

if (!empty($program['Program']['reps'])) {
	$label .= " " . $program['Program']['reps'];
	$desc  .= " de " . $this->Html->tag('strong', $program['Program']['reps']) . " répétitions";
}

if (!empty($program['Program']['weight'])) {
	$label .= " @ " . $program['Program']['weight'] . " kg";
	$desc  .= " à " . $this->Html->tag('strong', $program['Program']['weight']) . " kg";
}

if (!is_null($program['Program']['break'])) {
	if ($program['Program']['break'] === '0') {
		$desc .= " " . $this->Html->tag('strong', "sans récupération") . ".";
	} else {
		$desc .= " avec " . $this->Html->tag('strong', $this->Programs->breakTime($program['Program']['break'])) . " de récupération.";
	}
}

if (empty($popoverPlacement)) {
	$popoverPlacement = 'right';
}

$label = $this->Html->link($label, array('controller' => 'programs', 'action' => 'edit', $program['Program']['id']), array(
	'rel' => 'popover',
	'data-original-title' => $title,
	'data-content' => $desc,
	'data-placement' => $popoverPlacement,
	'data-toggle' => 'modal',
	'data-target' => '#modalLayer'
));
?>
<tr id="user-program-<?php echo $program['Program']['id']; ?>">
	<td>
		<?php echo $label; ?>
	</td>
	<td>
		<?php echo $this->Programs->breakTime($program['Program']['break']); ?>
	</td>
	<td class="user-program-actions">
		<?php echo $this->Html->link(
			$this->TB->icon('pencil'), 
			array('controller' => 'programs', 'action' => 'edit', $program['Program']['id']), 
			array(
				'title' => "Modifier l'exercice",
				'escape' => false,
				'data-toggle' => 'modal',
				'data-target' => '#modalLayer'
			)
		); ?> 
		<?php echo $this->Form->postLink(
			$this->TB->icon('trash'), 
			array('controller' => 'programs', 'action' => 'delete', $program['Program']['id']), 
			array(
				'title' => "Supprimer l'exercice",
				'escape' => false,
			),
			"Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"
		); ?>
	</td>
</tr>