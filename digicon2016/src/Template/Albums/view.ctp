<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?> </li>
<li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Album Photos'), ['controller' => 'AlbumPhotos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album Photo'), ['controller' => 'AlbumPhotos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?> </li>
<li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Album Photos'), ['controller' => 'AlbumPhotos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album Photo'), ['controller' => 'AlbumPhotos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($album->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $album->has('user') ? $this->Html->link($album->user->id, ['controller' => 'Users', 'action' => 'view', $album->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($album->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($album->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($album->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= $this->Text->autoParagraph(h($album->name)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related AlbumPhotos') ?></h3>
    </div>
    <?php if (!empty($album->album_photos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Album Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Shooted') ?></th>
                <th><?= __('Lat') ?></th>
                <th><?= __('Lng') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($album->album_photos as $albumPhotos): ?>
                <tr>
                    <td><?= h($albumPhotos->id) ?></td>
                    <td><?= h($albumPhotos->album_id) ?></td>
                    <td><?= h($albumPhotos->description) ?></td>
                    <td><?= h($albumPhotos->shooted) ?></td>
                    <td><?= h($albumPhotos->lat) ?></td>
                    <td><?= h($albumPhotos->lng) ?></td>
                    <td><?= h($albumPhotos->created) ?></td>
                    <td><?= h($albumPhotos->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'AlbumPhotos', 'action' => 'view', $albumPhotos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'AlbumPhotos', 'action' => 'edit', $albumPhotos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'AlbumPhotos', 'action' => 'delete', $albumPhotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhotos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related AlbumPhotos</p>
    <?php endif; ?>
</div>
