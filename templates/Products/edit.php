<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<?php
$this->assign('title', __('Edit Product'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Products'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $product->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($product) ?>
    <div class="card-body">
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('total') ?>
        <?= $this->Form->control('price') ?>
        <?= $this->Form->control('image') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('suplier_id', ['options' => $supliers, 'class' => 'form-control']) ?>
        <?= $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $product->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>