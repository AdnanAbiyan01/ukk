<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionFixture
 */
class TransactionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'transaction';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'qty' => 1,
                'type_transaction' => 1,
                'created' => '2024-04-20 15:47:05',
                'product_id' => 1,
                'customer_id' => 1,
            ],
        ];
        parent::init();
    }
}
