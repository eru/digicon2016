<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Album Photos'), ['controller' => 'AlbumPhotos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Album Photo'), ['controller' => 'AlbumPhotos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Album Photos'), ['controller' => 'AlbumPhotos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Album Photo'), ['controller' => 'AlbumPhotos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($album); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Album']) ?></legend>
    <?php
    echo $this->Form->input('user_id', ['options' => $users]);
    echo $this->Form->input('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
