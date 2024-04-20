<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Supliers Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Suplier newEmptyEntity()
 * @method \App\Model\Entity\Suplier newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Suplier> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Suplier get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Suplier findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Suplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Suplier> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Suplier|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Suplier saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Suplier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Suplier>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Suplier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Suplier> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Suplier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Suplier>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Suplier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Suplier> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SupliersTable extends Table
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

        $this->setTable('supliers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
            'foreignKey' => 'suplier_id',
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
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 128)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        return $validator;
    }
}
