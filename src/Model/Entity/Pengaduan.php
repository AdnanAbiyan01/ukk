<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pengaduan Entity
 *
 * @property int $id
 * @property int $masyarakat_id
 * @property string $judul_pengaduan
 * @property \Cake\I18n\FrozenTime $tgl_pengaduan
 * @property string $detail_laporan
 * @property string $foto
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Tanggapan[] $tanggapan
 */
class Pengaduan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'masyarakat_id' => true,
        'judul_pengaduan' => true,
        'tgl_pengaduan' => true,
        'detail_laporan' => true,
        'foto' => true,
        'created' => true,
        'modified' => true,
        'tanggapan' => true,
    ];
}
