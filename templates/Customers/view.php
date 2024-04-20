<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<?php
$this->assign('title', __('Customer'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Customers'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($customer->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($customer->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Phone Number') ?></th>
                <td><?= h($customer->phone_number) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($customer->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($customer->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($customer->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Alamat') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($customer->alamat)); ?>
    </div>
</div>

<div class="related related-transaction view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Transaction') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Transaction'), ['controller' => 'Transaction', 'action' => 'add', '?' => ['customer_id' => $customer->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($customer->transaction)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Transaction record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($customer->transaction as $transaction) : ?>
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
