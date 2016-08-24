<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Album Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="albumPhotos index large-9 medium-8 columns content">
    <h3><?= __('Album Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('album_id') ?></th>
                <th><?= $this->Paginator->sort('shooted') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($albumPhotos as $albumPhoto): ?>
            <tr>
                <td><?= $this->Number->format($albumPhoto->id) ?></td>
                <td><?= $albumPhoto->has('album') ? $this->Html->link($albumPhoto->album->id, ['controller' => 'Albums', 'action' => 'view', $albumPhoto->album->id]) : '' ?></td>
                <td><?= h($albumPhoto->shooted) ?></td>
                <td><?= h($albumPhoto->created) ?></td>
                <td><?= h($albumPhoto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $albumPhoto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $albumPhoto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $albumPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
