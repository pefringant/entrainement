<?php
$label = $exercise['Exercise']['short_name'];
$title = $exercise['Exercise']['full_name'];
$desc = "<em>Pas de précisions.</em>";

if (!empty($exercise['sets'])) {
	$label .= " : " . $exercise['sets'] . " séries";
	$desc = $this->Html->tag('strong', $exercise['sets']) . " série";
	if ($exercise['sets'] > 1) $desc .= "s";
}

if (!empty($exercise['reps'])) {
	$label .= " de " . $exercise['reps'];
	$desc  .= " de " . $this->Html->tag('strong', $exercise['reps']) . " répétitions";
}

if (!empty($exercise['description'])) {
	$label .= " " . $exercise['description'];
	$desc  .= " " . $this->Html->tag('strong', $exercise['description']);
}

if (!is_null($exercise['break'])) {
	if ($exercise['break'] === '0') {
		$desc .= " " . $this->Html->tag('strong', "sans récupération") . ".";
	} else {
		$desc .= " avec " . $this->Html->tag('strong', $this->Programs->breakTime($exercise['break'])) . " de récupération.";
	}
}

$label = $this->Html->link($label, '#', array(
	'rel' => 'popover',
	'data-original-title' => $title,
	'data-content' => $desc,
	'data-placement' => 'bottom',
));
?>
<tr>
	<td>
		<?php echo $label; ?>
	</td>
	<td>
		<?php echo $this->Programs->breakTime($exercise['break']); ?>
	</td>
</tr>