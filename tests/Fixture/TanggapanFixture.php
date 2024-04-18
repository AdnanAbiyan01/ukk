<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TanggapanFixture
 */
class TanggapanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tanggapan';
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
                'petugas_id' => 1,
                'pengaduan_id' => 1,
                'tgl_tanggapan' => '2023-11-05 15:21:44',
                'tanggapan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
