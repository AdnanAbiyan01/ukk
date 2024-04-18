<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Masyarakat Model
 *
 * @property \App\Model\Table\PengaduanTable&\Cake\ORM\Association\HasMany $Pengaduan
 *
 * @method \App\Model\Entity\Masyarakat newEmptyEntity()
 * @method \App\Model\Entity\Masyarakat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Masyarakat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Masyarakat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Masyarakat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Masyarakat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Masyarakat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Masyarakat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Masyarakat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Masyarakat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masyarakat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masyarakat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masyarakat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MasyarakatTable extends Table
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

        $this->setTable('masyarakat');
        $this->setDisplayField('nama');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pengaduan', [
            'foreignKey' => 'masyarakat_id',
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
            ->scalar('nama')
            ->maxLength('nama', 50)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('nik')
            ->maxLength('nik', 50)
            ->requirePresence('nik', 'create')
            ->notEmptyString('nik')
            ->add('nik', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('no_telp')
            ->maxLength('no_telp', 10)
            ->requirePresence('no_telp', 'create')
            ->notEmptyString('no_telp')
            ->add('no_telp', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('alamat')
            ->maxLength('alamat', 255)
            ->requirePresence('alamat', 'create')
            ->notEmptyString('alamat');

        $validator
            ->date('tanggal_lahir')
            ->requirePresence('tanggal_lahir', 'create')
            ->notEmptyDate('tanggal_lahir');

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
        $rules->add($rules->isUnique(['nik']), ['errorField' => 'nik']);
        $rules->add($rules->isUnique(['no_telp']), ['errorField' => 'no_telp']);

        return $rules;
    }
}
