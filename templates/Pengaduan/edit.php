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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pengaduan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pengaduan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pengaduan form content">
            <?= $this->Form->create($pengaduan) ?>
            <fieldset>
                <legend><?= __('Edit Pengaduan') ?></legend>
                <?php
                    echo $this->Form->control('masyarakat_id');
                    echo $this->Form->control('judul_pengaduan');
                    echo $this->Form->control('tgl_pengaduan');
                    echo $this->Form->control('detail_laporan');
                    echo $this->Form->control('foto');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
