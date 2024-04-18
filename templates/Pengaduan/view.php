<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pengaduan $pengaduan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pengaduan'), ['action' => 'edit', $pengaduan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pengaduan'), ['action' => 'delete', $pengaduan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pengaduan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pengaduan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pengaduan view content">
            <h3><?= h($pengaduan->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Judul Pengaduan') ?></th>
                    <td><?= h($pengaduan->judul_pengaduan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pengaduan->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Masyarakat Id') ?></th>
                    <td><?= $this->Number->format($pengaduan->masyarakat_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tgl Pengaduan') ?></th>
                    <td><?= h($pengaduan->tgl_pengaduan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pengaduan->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($pengaduan->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Detail Laporan') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pengaduan->detail_laporan)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Foto') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pengaduan->foto)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Tanggapan') ?></h4>
                <?php if (!empty($pengaduan->tanggapan)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Petugas Id') ?></th>
                            <th><?= __('Pengaduan Id') ?></th>
                            <th><?= __('Tgl Tanggapan') ?></th>
                            <th><?= __('Tanggapan') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pengaduan->tanggapan as $tanggapan) : ?>
                        <tr>
                            <td><?= h($tanggapan->id) ?></td>
                            <td><?= h($tanggapan->petugas_id) ?></td>
                            <td><?= h($tanggapan->pengaduan_id) ?></td>
                            <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                            <td><?= h($tanggapan->tanggapan) ?></td>
                            <td><?= h($tanggapan->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tanggapan', 'action' => 'view', $tanggapan->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tanggapan', 'action' => 'edit', $tanggapan->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tanggapan', 'action' => 'delete', $tanggapan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
