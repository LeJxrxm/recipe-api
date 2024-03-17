<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipeStepsFixture
 */
class RecipeStepsFixture extends TestFixture
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
                'ordre' => 1,
                'step' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-03-16 15:56:31',
                'modified' => '2024-03-16 15:56:31',
            ],
        ];
        parent::init();
    }
}
