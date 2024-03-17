<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \App\Model\Table\RecipeIngredientsTable&\Cake\ORM\Association\HasMany $RecipeIngredients
 * @property \App\Model\Table\RecipeStepsTable&\Cake\ORM\Association\HasMany $RecipeSteps
 *
 * @method \App\Model\Entity\Recipe newEmptyEntity()
 * @method \App\Model\Entity\Recipe newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipe> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Recipe findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipe> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Recipe saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('recipes');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RecipeIngredients', [
            'foreignKey' => 'recipe_id',
        ]);
        $this->hasMany('RecipeSteps', [
            'foreignKey' => 'recipe_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmptyString('image');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('tps_preparation')
            ->requirePresence('tps_preparation', 'create')
            ->notEmptyString('tps_preparation');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        return $validator;
    }
}
