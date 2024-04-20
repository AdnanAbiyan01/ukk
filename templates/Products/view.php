<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<?php
$this->assign('title', __('Product'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Products'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($product->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($product->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Suplier') ?></th>
                <td><?= $product->has('suplier') ? $this->Html->link($product->suplier->name, ['controller' => 'Supliers', 'action' => 'view', $product->suplier->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Category') ?></th>
                <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($product->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Total') ?></th>
                <td><?= $this->Number->format($product->total) ?></td>
            </tr>
            <tr>
                <th><?= __('Price') ?></th>
                <td><?= $this->Number->format($product->price) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($product->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($product->modified) ?></td>
            </tr>
        </table>
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
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Image') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($product->image)); ?>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($product->deskripsi)); ?>
    </div>
</div>

<div class="related related-transaction view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Transaction') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Transaction'), ['controller' => 'Transaction', 'action' => 'add', '?' => ['product_id' => $product->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Transaction'), ['controller' => 'Transaction', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Qty') ?></th>
                <th><?= __('Type Transaction') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($product->transaction)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Transaction record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($product->transaction as $transaction) : ?>
                    <tr>
                        <td><?= h($transaction->id) ?></td>
                        <td><?= h($transaction->qty) ?></td>
                        <td><?= h($transaction->type_transaction) ?></td>
                        <td><?= h($transaction->created) ?></td>
                        <td><?= h($transaction->product_id) ?></td>
                        <td><?= h($transaction->customer_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Transaction', 'action' => 'view', $transaction->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Transaction', 'action' => 'edit', $transaction->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transaction', 'action' => 'delete', $transaction->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
