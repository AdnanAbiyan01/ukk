<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $total
 * @property int|null $price
 * @property string $image
 * @property string $deskripsi
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $suplier_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\Suplier $suplier
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Transaction[] $transaction
 */
class Product extends Entity
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
    protected array $_accessible = [
        'name' => true,
        'total' => true,
        'price' => true,
        'image' => true,
        'deskripsi' => true,
        'created' => true,
        'modified' => true,
        'suplier_id' => true,
        'category_id' => true,
        'suplier' => true,
        'category' => true,
        'transaction' => true,
    ];
}
