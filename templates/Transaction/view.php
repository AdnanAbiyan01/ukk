<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>

<?php
$this->assign('title', __('Transaction'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Transaction'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($transaction->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Product') ?></th>
                <td><?= $transaction->has('product') ? $this->Html->link($transaction->product->name, ['controller' => 'Products', 'action' => 'view', $transaction->product->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Customer') ?></th>
                <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->name, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($transaction->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Qty') ?></th>
                <td><?= $this->Number->format($transaction->qty) ?></td>
            </tr>
            <tr>
                <th><?= __('Type Transaction') ?></th>
                <td><?= $this->Number->format($transaction->type_transaction) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($transaction->created) ?></td>
            </tr>
        </table>
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
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
