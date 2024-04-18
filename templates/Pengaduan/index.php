<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pengaduan> $pengaduan
 */
?>
<div class="pengaduan index content">
    <?= $this->Html->link(__('New Pengaduan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pengaduan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('masyarakat_id') ?></th>
                    <th><?= $this->Paginator->sort('judul_pengaduan') ?></th>
                    <th><?= $this->Paginator->sort('tgl_pengaduan') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengaduan as $id => $pengaduan): ?>
                <tr>
                    <td><?= $this->Number->format($id + 1) ?></td>
                    <td><?= $this->Number->format($pengaduan->masyarakat_id) ?></td>
                    <td><?= h($pengaduan->judul_pengaduan) ?></td>
                    <td><?= h($pengaduan->tgl_pengaduan) ?></td>
                    <td><?= $this->Html->image('../upload/'. $pengaduan->foto, ['width'=>'100px']);?></td>
                    <td><?= h($pengaduan->created) ?></td>
                    <td><?= h($pengaduan->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pengaduan->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pengaduan->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pengaduan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
