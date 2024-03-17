<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipeIngredientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipeIngredientsTable Test Case
 */
class RecipeIngredientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipeIngredientsTable
     */
    protected $RecipeIngredients;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RecipeIngredients',
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
        $config = $this->getTableLocator()->exists('RecipeIngredients') ? [] : ['className' => RecipeIngredientsTable::class];
        $this->RecipeIngredients = $this->getTableLocator()->get('RecipeIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RecipeIngredients);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RecipeIngredientsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RecipeIngredientsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
