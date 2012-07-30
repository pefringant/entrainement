<?php
$this->set('title_for_layout', "Nouvel athlète");
?>
<div class="users form">
	<h1>Nouvel athlète</h1>

	<?php echo $this->Form->create('User', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<legend>Etat civil</legend>
		<?php echo $this->TB->input('first_name', array(
			'label' => "Prénom :",
		)); ?> 
		<?php echo $this->TB->input('last_name', array(
			'label' => "Nom :",
		)); ?> 
		<?php echo $this->TB->input('short_name', array(
			'label' => "Surnom, nom abrégé :",
		)); ?> 
		<?php echo $this->TB->input('gender', array(
			'label' => "Genre :",
			'options' => array('M' => "Homme", 'F' => 'Femme'),
			'empty' => true
		)); ?> 
		<?php echo $this->TB->input('birth', array(
			'label' => "Date de naissance :",
			'dateFormat' => 'DMY',
			'monthNames' => false,
			'style' => 'width: 70px',
			'minYear' => date('Y', strtotime('-100 years')),
			'maxYear' => date('Y', strtotime('-5 years')),
			'empty' => true
		)); ?> 
		<?php echo $this->TB->input('photo', array(
			'label' => "Photo :",
			'type' => 'file'
		)); ?> 
	</fieldset>

	<fieldset>
		<legend>Informations de connexion</legend>
		<?php echo $this->TB->input('email', array(
			'label' => "Email :",
		)); ?> 
		<?php echo $this->TB->input('username', array(
			'label' => "Login :",
		)); ?> 
		<?php echo $this->TB->input('password', array(
			'label' => "Mot de passe :",
		)); ?> 
	</fieldset>

	<div class="form-actions">
		<?php echo $this->TB->button("{$this->TB->icon('ok', 'white')} Valider", array("style" => "success", "size" => "large")); ?>
	</div>
	<?php echo $this->Form->end(); ?>

	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('list')} Liste des athlètes", array('action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>