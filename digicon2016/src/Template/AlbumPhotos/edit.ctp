<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $albumPhoto->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $albumPhoto->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($albumPhoto); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Album Photo']) ?></legend>
    <?php
    echo $this->Form->input('album_id', ['options' => $albums]);
    echo $this->Form->input('description');
    echo $this->Form->input('shooted');
    echo $this->Form->input('lat');
    echo $this->Form->input('lng');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
