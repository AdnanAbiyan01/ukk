<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>

<?php
$this->assign('title', __('Edit Transaction'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Transaction'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $transaction->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($transaction) ?>
    <div class="card-body">
        <?= $this->Form->control('qty') ?>
        <?= $this->Form->control('type_transaction') ?>
        <?= $this->Form->control('product_id', ['options' => $products, 'class' => 'form-control']) ?>
        <?= $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $transaction->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>