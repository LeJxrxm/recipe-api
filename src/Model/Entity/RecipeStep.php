<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecipeStep Entity
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $ordre
 * @property string $step
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Recipe $recipe
 */
class RecipeStep extends Entity
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
        'recipe_id' => true,
        'ordre' => true,
        'step' => true,
        'created' => true,
        'modified' => true,
        'recipe' => true,
    ];
}
