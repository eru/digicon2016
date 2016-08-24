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

<?= $this->append('script'); ?>
<script><!-- //
var photos = <?= json_encode($photos, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
// --></script>
<?= $this->end(); ?>
