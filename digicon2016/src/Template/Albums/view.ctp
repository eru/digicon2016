<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Albums'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Album Photos'), ['controller' => 'AlbumPhotos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Album Photo'), ['controller' => 'AlbumPhotos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="albums view large-9 medium-8 columns content">
    <h3><?= h($album->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $album->has('user') ? $this->Html->link($album->user->id, ['controller' => 'Users', 'action' => 'view', $album->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($album->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($album->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($album->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($album->name)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Album Photos') ?></h4>
        <?php if (!empty($album->album_photos)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'AlbumPhotos', 'action' => 'view', $albumPhotos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AlbumPhotos', 'action' => 'edit', $albumPhotos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AlbumPhotos', 'action' => 'delete', $albumPhotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhotos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
