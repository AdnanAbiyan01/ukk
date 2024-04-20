<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupliersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupliersTable Test Case
 */
class SupliersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SupliersTable
     */
    protected $Supliers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Supliers',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Supliers') ? [] : ['className' => SupliersTable::class];
        $this->Supliers = $this->getTableLocator()->get('Supliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Supliers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SupliersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
