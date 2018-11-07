<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmdocumentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmdocumentosTable Test Case
 */
class AdmdocumentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmdocumentosTable
     */
    public $Admdocumentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admdocumentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Admdocumentos') ? [] : ['className' => AdmdocumentosTable::class];
        $this->Admdocumentos = TableRegistry::get('Admdocumentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Admdocumentos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
