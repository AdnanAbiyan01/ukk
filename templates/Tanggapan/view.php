<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tanggapan $tanggapan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tanggapan'), ['action' => 'edit', $tanggapan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tanggapan'), ['action' => 'delete', $tanggapan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tanggapan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tanggapan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tanggapan view content">
            <h3><?= h($tanggapan->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Petuga') ?></th>
                    <td><?= $tanggapan->has('petuga') ? $this->Html->link($tanggapan->petuga->nama, ['controller' => 'Petugas', 'action' => 'view', $tanggapan->petuga->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pengaduan') ?></th>
                    <td><?= $tanggapan->has('pengaduan') ? $this->Html->link($tanggapan->pengaduan->id, ['controller' => 'Pengaduan', 'action' => 'view', $tanggapan->pengaduan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tanggapan->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($tanggapan->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tgl Tanggapan') ?></th>
                    <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Tanggapan') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tanggapan->tanggapan)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
