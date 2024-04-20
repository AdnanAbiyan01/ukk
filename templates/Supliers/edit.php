<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suplier $suplier
 */
?>

<?php
$this->assign('title', __('Edit Suplier'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Supliers'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $suplier->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($suplier) ?>
    <div class="card-body">
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('address') ?>
        <?= $this->Form->control('phone_number') ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $suplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $suplier->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $suplier->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>