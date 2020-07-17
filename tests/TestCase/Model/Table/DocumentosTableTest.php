<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentosTable Test Case
 */
class DocumentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentosTable
     */
    protected $Documentos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Documentos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Documentos') ? [] : ['className' => DocumentosTable::class];
        $this->Documentos = TableRegistry::getTableLocator()->get('Documentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Documentos);

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
