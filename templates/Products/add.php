<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<?php
$this->assign('title', __('Add Product'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Products'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($product, ['enctype' => 'multipart/form-data'], ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('total') ?>
        <?= $this->Form->control('price') ?>
        <?= $this->Form->control('image', ['type' => 'file']) ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('suplier_id', ['options' => $supliers, 'class' => 'form-control']) ?>
        <?= $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
