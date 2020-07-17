<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detalles Model
 *
 * @method \App\Model\Entity\Detalle newEmptyEntity()
 * @method \App\Model\Entity\Detalle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Detalle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detalle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detalle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Detalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detalle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detalle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detalle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detalle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Detalle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DetallesTable extends Table
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

        $this->setTable('detalles');
        $this->setDisplayField('id_detalle');
        $this->setPrimaryKey('id_detalle');
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
            ->integer('id_detalle')
            ->allowEmptyString('id_detalle', null, 'create');

        $validator
            ->integer('id_factura')
            ->allowEmptyString('id_factura');

        $validator
            ->integer('id_producto')
            ->allowEmptyString('id_producto');

        $validator
            ->integer('cantidad_producto')
            ->allowEmptyString('cantidad_producto');

        $validator
            ->integer('id_tax')
            ->allowEmptyString('id_tax');

        $validator
            ->integer('precio_total')
            ->allowEmptyString('precio_total');

        return $validator;
    }
}
