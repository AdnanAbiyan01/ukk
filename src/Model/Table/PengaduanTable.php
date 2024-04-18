<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pengaduan Model
 *
 * @property \App\Model\Table\TanggapanTable&\Cake\ORM\Association\HasMany $Tanggapan
 *
 * @method \App\Model\Entity\Pengaduan newEmptyEntity()
 * @method \App\Model\Entity\Pengaduan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pengaduan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pengaduan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pengaduan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengaduan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PengaduanTable extends Table
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

        $this->setTable('pengaduan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Masyarakat', [
            'foreignKey' => 'masyarakat_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Tanggapan', [
            'foreignKey' => 'pengaduan_id',
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
            ->integer('masyarakat_id')
            ->notEmptyString('masyarakat_id');

        $validator
            ->scalar('judul_pengaduan')
            ->maxLength('judul_pengaduan', 128)
            ->requirePresence('judul_pengaduan', 'create')
            ->notEmptyString('judul_pengaduan');

        $validator
            ->dateTime('tgl_pengaduan')
            ->requirePresence('tgl_pengaduan', 'create')
            ->notEmptyDateTime('tgl_pengaduan');

        $validator
            ->scalar('detail_laporan')
            ->requirePresence('detail_laporan', 'create')
            ->notEmptyString('detail_laporan');

        $validator
            ->scalar('foto')
            ->requirePresence('foto', 'create')
            ->notEmptyString('foto');

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
        $rules->add($rules->existsIn('masyarakat_id', 'Masyarakat'), ['errorField' => 'masyarakat_id']);

        return $rules;
    }
}
