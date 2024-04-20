<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transaction Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Transaction newEmptyEntity()
 * @method \App\Model\Entity\Transaction newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Transaction findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionTable extends Table
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

        $this->setTable('transaction');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->integer('type_transaction')
            ->requirePresence('type_transaction', 'create')
            ->notEmptyString('type_transaction');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('customer_id')
            ->notEmptyString('customer_id');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['customer_id'], 'Customers'), ['errorField' => 'customer_id']);

        return $rules;
    }
}
