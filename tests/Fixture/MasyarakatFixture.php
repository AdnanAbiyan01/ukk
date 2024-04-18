<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MasyarakatFixture
 */
class MasyarakatFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'masyarakat';
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
                'nama' => 'Lorem ipsum dolor sit amet',
                'nik' => 'Lorem ipsum dolor sit amet',
                'no_telp' => 'Lorem ip',
                'alamat' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-05 15:21:13',
                'modified' => '2023-11-05 15:21:13',
                'tanggal_lahir' => '2023-11-05',
            ],
        ];
        parent::init();
    }
}
