<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tanggapan Model
 *
 * @property \App\Model\Table\PetugasTable&\Cake\ORM\Association\BelongsTo $Petugas
 * @property \App\Model\Table\PengaduanTable&\Cake\ORM\Association\BelongsTo $Pengaduan
 *
 * @method \App\Model\Entity\Tanggapan newEmptyEntity()
 * @method \App\Model\Entity\Tanggapan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tanggapan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tanggapan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tanggapan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tanggapan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tanggapan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TanggapanTable extends Table
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

        $this->setTable('tanggapan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Petugas', [
            'foreignKey' => 'petugas_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pengaduan', [
            'foreignKey' => 'pengaduan_id',
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
            ->integer('petugas_id')
            ->notEmptyString('petugas_id');

        $validator
            ->integer('pengaduan_id')
            ->notEmptyString('pengaduan_id');

        $validator
            ->dateTime('tgl_tanggapan')
            ->requirePresence('tgl_tanggapan', 'create')
            ->notEmptyDateTime('tgl_tanggapan');

        $validator
            ->scalar('tanggapan')
            ->requirePresence('tanggapan', 'create')
            ->notEmptyString('tanggapan');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn('petugas_id', 'Petugas'), ['errorField' => 'petugas_id']);
        $rules->add($rules->existsIn('pengaduan_id', 'Pengaduan'), ['errorField' => 'pengaduan_id']);

        return $rules;
    }
}
