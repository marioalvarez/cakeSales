<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taxes Model
 *
 * @method \App\Model\Entity\Tax newEmptyEntity()
 * @method \App\Model\Entity\Tax newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tax[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tax get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tax findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tax patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tax[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tax|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tax saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TaxesTable extends Table
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

        $this->setTable('taxes');
        $this->setDisplayField('porcentaje_tax');
        $this->setPrimaryKey('id_tax');
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
            ->integer('id_tax')
            ->allowEmptyString('id_tax', null, 'create');

        $validator
            ->scalar('nombre_tax')
            ->maxLength('nombre_tax', 11)
            ->requirePresence('nombre_tax', 'create')
            ->notEmptyString('nombre_tax');

        $validator
            ->integer('porcentaje_tax')
            ->requirePresence('porcentaje_tax', 'create')
            ->notEmptyString('porcentaje_tax');

        $validator
            ->date('created_at')
            ->notEmptyDate('created_at');

        return $validator;
    }
}
