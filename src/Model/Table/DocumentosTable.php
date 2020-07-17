<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentos Model
 *
 * @method \App\Model\Entity\Documento newEmptyEntity()
 * @method \App\Model\Entity\Documento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Documento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Documento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Documento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Documento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Documento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Documento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DocumentosTable extends Table
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

        $this->setTable('documentos');
        $this->setDisplayField('nombre_documento');
        $this->setPrimaryKey('id_documento');
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
            ->integer('id_documento')
            ->allowEmptyString('id_documento', null, 'create')
            ->add('id_documento', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('codigo_documento')
            ->requirePresence('codigo_documento', 'create')
            ->notEmptyString('codigo_documento')
            ->add('codigo_documento', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nombre_documento')
            ->maxLength('nombre_documento', 100)
            ->requirePresence('nombre_documento', 'create')
            ->notEmptyString('nombre_documento');

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
        $rules->add($rules->isUnique(['codigo_documento']));
        $rules->add($rules->isUnique(['id_documento']));

        return $rules;
    }
}
