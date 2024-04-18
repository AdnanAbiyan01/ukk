<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasyarakatTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasyarakatTable Test Case
 */
class MasyarakatTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MasyarakatTable
     */
    protected $Masyarakat;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Masyarakat',
        'app.Pengaduan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Masyarakat') ? [] : ['className' => MasyarakatTable::class];
        $this->Masyarakat = $this->getTableLocator()->get('Masyarakat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Masyarakat);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MasyarakatTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MasyarakatTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
