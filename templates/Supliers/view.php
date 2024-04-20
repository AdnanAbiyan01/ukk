<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suplier $suplier
 */
?>

<?php
$this->assign('title', __('Suplier'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Supliers'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($suplier->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($suplier->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Phone Number') ?></th>
                <td><?= h($suplier->phone_number) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($suplier->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($suplier->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($suplier->modified) ?></td>
            </tr>
        </table>
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
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suplier->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Address') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($suplier->address)); ?>
    </div>
</div>

<div class="related related-product view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Products') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add', '?' => ['suplier_id' => $suplier->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Suplier Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($suplier->products)) : ?>
                <tr>
                    <td colspan="11" class="text-muted">
                        <?= __('Products record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($suplier->products as $product) : ?>
                    <tr>
                        <td><?= h($product->id) ?></td>
                        <td><?= h($product->name) ?></td>
                        <td><?= h($product->total) ?></td>
                        <td><?= h($product->price) ?></td>
                        <td><?= h($product->image) ?></td>
                        <td><?= h($product->deskripsi) ?></td>
                        <td><?= h($product->created) ?></td>
                        <td><?= h($product->modified) ?></td>
                        <td><?= h($product->suplier_id) ?></td>
                        <td><?= h($product->category_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
