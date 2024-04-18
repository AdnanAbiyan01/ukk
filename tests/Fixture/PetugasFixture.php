<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PetugasFixture
 */
class PetugasFixture extends TestFixture
{
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
                'no_telp' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
