<?php
$this->extend('../Layout/TwitterBootstrap/signin');
?>
<?= $this->Form->create(); ?>
<fieldset>
    <legend><?= __('Login') ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
