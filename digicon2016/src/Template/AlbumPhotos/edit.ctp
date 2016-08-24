<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $albumPhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $albumPhoto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Album Photos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="albumPhotos form large-9 medium-8 columns content">
    <?= $this->Form->create($albumPhoto) ?>
    <fieldset>
        <legend><?= __('Edit Album Photo') ?></legend>
        <?php
            echo $this->Form->input('album_id', ['options' => $albums, 'empty' => true]);
            echo $this->Form->input('description');
            echo $this->Form->input('shooted', ['empty' => true]);
            echo $this->Form->input('lat');
            echo $this->Form->input('lng');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
