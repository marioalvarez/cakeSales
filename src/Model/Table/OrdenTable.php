<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orden Model
 *
 * @method \App\Model\Entity\Orden newEmptyEntity()
 * @method \App\Model\Entity\Orden newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Orden[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orden get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orden findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Orden patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orden[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orden|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orden saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdenTable extends Table
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

        $this->setTable('orden');
        $this->setDisplayField('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('id_producto')
            ->requirePresence('id_producto', 'create')
            ->notEmptyString('id_producto');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmptyString('cantidad');

        $validator
            ->decimal('iva')
            ->requirePresence('iva', 'create')
            ->notEmptyString('iva');

        $validator
            ->decimal('neto')
            ->requirePresence('neto', 'create')
            ->notEmptyString('neto');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        return $validator;
    }
}
