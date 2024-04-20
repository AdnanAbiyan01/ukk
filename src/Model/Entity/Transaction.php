<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $qty
 * @property int $type_transaction
 * @property \Cake\I18n\DateTime $created
 * @property int $product_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Customer $customer
 */
class Transaction extends Entity
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
        'qty' => true,
        'type_transaction' => true,
        'created' => true,
        'product_id' => true,
        'customer_id' => true,
        'product' => true,
        'customer' => true,
    ];
}
