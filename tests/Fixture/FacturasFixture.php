<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacturasFixture
 */
class FacturasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id_venta' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tipo_documento' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_cliente' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'total_factura' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created_at' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_DOCUMENTOS' => ['type' => 'index', 'columns' => ['tipo_documento'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_venta'], 'length' => []],
            'id_cliente' => ['type' => 'unique', 'columns' => ['id_cliente'], 'length' => []],
            'FK_FACTURAS_CLIENTES' => ['type' => 'foreign', 'columns' => ['id_cliente'], 'references' => ['clientes', 'id_cliente'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_DOCUMENTOS' => ['type' => 'foreign', 'columns' => ['tipo_documento'], 'references' => ['documentos', 'codigo_documento'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_venta' => 1,
                'tipo_documento' => 1,
                'id_cliente' => 1,
                'total_factura' => 1.5,
                'created_at' => '2020-07-14',
            ],
        ];
        parent::init();
    }
}
