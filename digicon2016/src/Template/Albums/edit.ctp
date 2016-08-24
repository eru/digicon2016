<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit']); ?></li>
    <li>
      <ul>
      <?php foreach ($albums as $album): ?>
        <li>
          <?= $this->Html->link(h($album->name), ['action' => 'view', $album->id]); ?></li>
        </li>
      <?php endforeach; ?>
    </ul>
    </li>
</ul>
<?php
$this->end();
?>

<?= $this->Form->create('', ['type' => 'file']); ?>
<fieldset>
    <legend><?= __('Albums Edit') ?></legend>
    <?= $this->Form->select('id', $albums_select, ['empty' => __('New album')]); ?>
    <?= $this->Form->input('name', ['type' => 'text', 'label' => __('Album name')]); ?>
    <?= $this->Form->input('album_photos.', ['type' => 'file', 'multiple' => true, 'label' => __('Select photos')]); ?>
</fieldset>
<?= $this->Form->button(__('Save')); ?>
<?= $this->Form->end() ?>

<?= $this->append('script'); ?>
<script><!-- //
    $(function() {
        $('[name="id"]').on('change', function(obj) {
            if ($(this).val()) {
                $('[name="name"]').val($('[name="id"] option:selected').text());
            } else {
                $('[name="name"]').val('');
            }
        });
    });
// --></script>
<?= $this->end(); ?>
