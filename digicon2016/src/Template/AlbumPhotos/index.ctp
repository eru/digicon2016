<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Album Photo'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Album'), ['controller' => ' Albums', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('album_id'); ?></th>
            <th><?= $this->Paginator->sort('shooted'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($albumPhotos as $albumPhoto): ?>
        <tr>
            <td><?= $this->Number->format($albumPhoto->id) ?></td>
            <td>
                <?= $albumPhoto->has('album') ? $this->Html->link($albumPhoto->album->id, ['controller' => 'Albums', 'action' => 'view', $albumPhoto->album->id]) : '' ?>
            </td>
            <td><?= h($albumPhoto->shooted) ?></td>
            <td><?= h($albumPhoto->created) ?></td>
            <td><?= h($albumPhoto->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $albumPhoto->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $albumPhoto->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $albumPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>