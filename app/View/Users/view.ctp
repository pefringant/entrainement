<?php
$this->set('title_for_layout', $user['User']['short_name']);
?>
<div class="users view">
<h1><?php echo $user['User']['short_name']; ?></h1>
<p>Créé le <?php echo $this->Time->format('d-m-Y à H\hi', $user['User']['created']); ?></p>
	<h2>Etat civil</h2>
	<dl class="dl-horizontal">
		<dt>Prénom :</dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt>Nom :</dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt>Surnom :</dt>
		<dd>
			<?php echo h($user['User']['short_name']); ?>
			&nbsp;
		</dd>
		<?php if (!empty($user['User']['gender'])): ?>
		<dt>Genre :</dt>
		<dd>
			<?php echo $user['User']['gender'] == 'M' ? "Homme" : "Femme"; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt>Né<?php if ($user['User']['gender'] == 'F') echo "e"; ?> le :</dt>
		<dd>
			<?php echo $this->TimePaginator->formatDate($user['User']['birth']); ?>
			&nbsp;
		</dd>
		<dt>Photo :</dt>
		<dd>
			<?php echo $this->Users->photo($user, 'thumb'); ?>
			&nbsp;
		</dd>
	</dl>

	<h2>Informations de connexion</h2>
	<dl class="dl-horizontal">
		<dt>Email :</dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt>Login :</dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt>Mot de passe :</dt>
		<dd>
			(secret)
			&nbsp;
		</dd>
	</dl>

	<div class="form-actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('pencil', 'white')} Modifier", array('action' => 'edit', $user['User']['id']), array(
			'class' => 'btn btn-primary',
			'escape' => false,
		));
		?> 
		<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet athlète ?"); ?> 
	</div>

	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('list')} Liste des athlètes", array('action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>
