<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property string $image
 * @property int $tps_preparation
 * @property int $user_id
 * @property int $is_active
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\RecipeIngredient[] $recipe_ingredients
 * @property \App\Model\Entity\RecipeStep[] $recipe_steps
 */
class Recipe extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'titre' => true,
        'image' => true,
        'description' => true,
        'tps_preparation' => true,
        'user_id' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'recipe_ingredients' => true,
        'recipe_steps' => true,
    ];
}
