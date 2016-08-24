<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Album Photo'), ['action' => 'edit', $albumPhoto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Album Photo'), ['action' => 'delete', $albumPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album Photo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="albumPhotos view large-9 medium-8 columns content">
    <h3><?= h($albumPhoto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Album') ?></th>
            <td><?= $albumPhoto->has('album') ? $this->Html->link($albumPhoto->album->id, ['controller' => 'Albums', 'action' => 'view', $albumPhoto->album->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($albumPhoto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Shooted') ?></th>
            <td><?= h($albumPhoto->shooted) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($albumPhoto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($albumPhoto->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($albumPhoto->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Lat') ?></h4>
        <?= $this->Text->autoParagraph(h($albumPhoto->lat)); ?>
    </div>
    <div class="row">
        <h4><?= __('Lng') ?></h4>
        <?= $this->Text->autoParagraph(h($albumPhoto->lng)); ?>
    </div>
</div>
