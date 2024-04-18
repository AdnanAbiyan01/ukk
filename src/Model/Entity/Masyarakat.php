<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Masyarakat Entity
 *
 * @property int $id
 * @property string $nama
 * @property string $nik
 * @property string $no_telp
 * @property string $alamat
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenDate $tanggal_lahir
 *
 * @property \App\Model\Entity\Pengaduan[] $pengaduan
 */
class Masyarakat extends Entity
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
        'nama' => true,
        'nik' => true,
        'no_telp' => true,
        'alamat' => true,
        'created' => true,
        'modified' => true,
        'tanggal_lahir' => true,
        'pengaduan' => true,
    ];
}
