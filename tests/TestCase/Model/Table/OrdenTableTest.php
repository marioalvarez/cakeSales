<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdenTable Test Case
 */
class OrdenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdenTable
     */
    protected $Orden;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Orden',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Orden') ? [] : ['className' => OrdenTable::class];
        $this->Orden = TableRegistry::getTableLocator()->get('Orden', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Orden);

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
}
