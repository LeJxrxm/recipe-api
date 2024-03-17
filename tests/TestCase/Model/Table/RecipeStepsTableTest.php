<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipeStepsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipeStepsTable Test Case
 */
class RecipeStepsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipeStepsTable
     */
    protected $RecipeSteps;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RecipeSteps',
        'app.Recipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RecipeSteps') ? [] : ['className' => RecipeStepsTable::class];
        $this->RecipeSteps = $this->getTableLocator()->get('RecipeSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RecipeSteps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RecipeStepsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RecipeStepsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
