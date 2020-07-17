<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facturas Model
 *
 * @method \App\Model\Entity\Factura newEmptyEntity()
 * @method \App\Model\Entity\Factura newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Factura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factura get($primaryKey, $options = [])
 * @method \App\Model\Entity\Factura findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Factura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Factura[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factura|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factura saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FacturasTable extends Table
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

        $this->setTable('facturas');
        $this->setDisplayField('id_venta');
        $this->setPrimaryKey('id_venta');

        $this->belongsTo('Documentos');
        $this->belongsTo('Taxes');

        $this->hasOne('Clientes');

        $this->hasMany('Detalles',[
            'foreignKey' => 'id_factura',
            'dependent'=>true]);
        $this->hasMany('Productos');
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
            ->integer('id_venta')
            ->allowEmptyString('id_venta', null, 'create');

        $validator
            ->integer('tipo_documento')
            ->requirePresence('tipo_documento', 'create')
            ->notEmptyString('tipo_documento');

        $validator
            ->integer('id_cliente')
            ->requirePresence('id_cliente', 'create')
            ->notEmptyString('id_cliente');

            
            //->add('id_cliente', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('total_factura')
            ->requirePresence('total_factura', 'create')
            ->notEmptyString('total_factura');

        $validator
            ->date('created_at')
            ->notEmptyDate('created_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id_cliente']));

        return $rules;
    }
    */
}
