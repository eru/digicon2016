<?php
$this->extend('../Layout/TwitterBootstrap/signin');
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Add') ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Add')); ?>
<?= $this->Form->end() ?>
