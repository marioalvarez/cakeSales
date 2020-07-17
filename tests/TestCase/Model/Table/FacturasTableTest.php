<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacturasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacturasTable Test Case
 */
class FacturasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FacturasTable
     */
    protected $Facturas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Facturas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Facturas') ? [] : ['className' => FacturasTable::class];
        $this->Facturas = TableRegistry::getTableLocator()->get('Facturas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Facturas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
