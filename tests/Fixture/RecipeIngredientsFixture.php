<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipeIngredientsFixture
 */
class RecipeIngredientsFixture extends TestFixture
{
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
                'recipe_id' => 1,
                'ingredient' => 1,
                'ordre' => 1,
            ],
        ];
        parent::init();
    }
}
