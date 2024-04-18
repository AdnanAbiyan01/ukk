<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Petugas Model
 *
 * @method \App\Model\Entity\Petuga newEmptyEntity()
 * @method \App\Model\Entity\Petuga newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Petuga[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Petuga get($primaryKey, $options = [])
 * @method \App\Model\Entity\Petuga findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Petuga patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Petuga[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Petuga|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Petuga saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PetugasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('petugas');
        $this->setDisplayField('nama');
        $this->setPrimaryKey('id');
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
            ->scalar('nama')
            ->maxLength('nama', 50)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('no_telp')
            ->maxLength('no_telp', 255)
            ->requirePresence('no_telp', 'create')
            ->notEmptyString('no_telp')
            ->add('no_telp', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['no_telp']), ['errorField' => 'no_telp']);

        return $rules;
    }
}
