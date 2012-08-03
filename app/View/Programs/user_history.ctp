<?php
$this->set('title_for_layout', "Historique de {$user['User']['short_name']}");
?>

<div class="programs index">
	<h1>Historique de <?php echo $user['User']['short_name']; ?></h1>

	<?php if (empty($programs)): ?>
		<div class="alert">
			L'historique est vide.
		</div>
	<?php else:	$currentDate = false; ?>
		<?php echo $this->element('Program'.DS.'user_history_actions', compact('user')); ?> 
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
			<dd><?php echo $label; ?></dd>
		<?php
		$currentDate = $program['Program']['effective_date'];
		endforeach; ?>
		</dl>
	<?php endif; ?>

	<?php echo $this->element('Program'.DS.'user_history_actions', compact('user')); ?> 
</div>