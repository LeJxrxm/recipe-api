<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecipeSteps Model
 *
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\BelongsTo $Recipes
 *
 * @method \App\Model\Entity\RecipeStep newEmptyEntity()
 * @method \App\Model\Entity\RecipeStep newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RecipeStep> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeStep get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RecipeStep findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RecipeStep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RecipeStep> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeStep|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RecipeStep saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RecipeStep>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecipeStep>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecipeStep>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecipeStep> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecipeStep>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecipeStep>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecipeStep>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecipeStep> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipeStepsTable extends Table
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

        $this->setTable('recipe_steps');
        $this->setDisplayField('step');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Recipes', [
            'foreignKey' => 'recipe_id',
            'joinType' => 'INNER',
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
            ->integer('recipe_id')
            ->notEmptyString('recipe_id');

        $validator
            ->integer('ordre')
            ->requirePresence('ordre', 'create')
            ->notEmptyString('ordre');

        $validator
            ->scalar('step')
            ->maxLength('step', 255)
            ->requirePresence('step', 'create')
            ->notEmptyString('step');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['recipe_id'], 'Recipes'), ['errorField' => 'recipe_id']);

        return $rules;
    }
}
