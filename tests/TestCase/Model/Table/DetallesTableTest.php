<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesTable Test Case
 */
class DetallesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesTable
     */
    protected $Detalles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Detalles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Detalles') ? [] : ['className' => DetallesTable::class];
        $this->Detalles = TableRegistry::getTableLocator()->get('Detalles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Detalles);

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
