<section class="content-header">
  <h1>
    Masyarakat
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Nama') ?></dt>
            <dd><?= h($masyarakat->nama) ?></dd>
            <dt scope="row"><?= __('Nik') ?></dt>
            <dd><?= h($masyarakat->nik) ?></dd>
            <dt scope="row"><?= __('No Telp') ?></dt>
            <dd><?= h($masyarakat->no_telp) ?></dd>
            <dt scope="row"><?= __('Alamat') ?></dt>
            <dd><?= h($masyarakat->alamat) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($masyarakat->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($masyarakat->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($masyarakat->modified) ?></dd>
            <dt scope="row"><?= __('Tanggal Lahir') ?></dt>
            <dd><?= h($masyarakat->tanggal_lahir) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Pengaduan') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($masyarakat->pengaduan)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Masyarakat Id') ?></th>
                    <th scope="col"><?= __('Judul Pengaduan') ?></th>
                    <th scope="col"><?= __('Tgl Pengaduan') ?></th>
                    <th scope="col"><?= __('Detail Laporan') ?></th>
                    <th scope="col"><?= __('Foto') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($masyarakat->pengaduan as $pengaduan): ?>
              <tr>
                    <td><?= h($pengaduan->id) ?></td>
                    <td><?= h($pengaduan->masyarakat_id) ?></td>
                    <td><?= h($pengaduan->judul_pengaduan) ?></td>
                    <td><?= h($pengaduan->tgl_pengaduan) ?></td>
                    <td><?= h($pengaduan->detail_laporan) ?></td>
                    <td><?= h($pengaduan->foto) ?></td>
                    <td><?= h($pengaduan->created) ?></td>
                    <td><?= h($pengaduan->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Pengaduan', 'action' => 'view', $pengaduan->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Pengaduan', 'action' => 'edit', $pengaduan->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pengaduan', 'action' => 'delete', $pengaduan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
