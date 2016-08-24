<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Album Photo'), ['action' => 'edit', $albumPhoto->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Album Photo'), ['action' => 'delete', $albumPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]) ?> </li>
<li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album Photo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Album Photo'), ['action' => 'edit', $albumPhoto->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Album Photo'), ['action' => 'delete', $albumPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]) ?> </li>
<li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album Photo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($albumPhoto->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Album') ?></td>
            <td><?= $albumPhoto->has('album') ? $this->Html->link($albumPhoto->album->id, ['controller' => 'Albums', 'action' => 'view', $albumPhoto->album->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($albumPhoto->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Shooted') ?></td>
            <td><?= h($albumPhoto->shooted) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($albumPhoto->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($albumPhoto->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($albumPhoto->description)); ?></td>
        </tr>
        <tr>
            <td><?= __('Lat') ?></td>
            <td><?= $this->Text->autoParagraph(h($albumPhoto->lat)); ?></td>
        </tr>
        <tr>
            <td><?= __('Lng') ?></td>
            <td><?= $this->Text->autoParagraph(h($albumPhoto->lng)); ?></td>
        </tr>
    </table>
</div>

