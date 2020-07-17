<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetallesFixture
 */
class DetallesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id_detalle' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_factura' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_producto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad_producto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_tax' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'precio_total' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_factura' => ['type' => 'index', 'columns' => ['id_factura'], 'length' => []],
            'detalles_ibfk_1' => ['type' => 'index', 'columns' => ['id_tax'], 'length' => []],
            'detalles_ibfk_3' => ['type' => 'index', 'columns' => ['id_producto'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_detalle'], 'length' => []],
            'detalles_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_producto'], 'references' => ['productos', 'id_producto'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'detalles_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_factura'], 'references' => ['facturas', 'id_venta'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'detalles_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_tax'], 'references' => ['taxes', 'id_tax'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id_detalle' => 1,
                'id_factura' => 1,
                'id_producto' => 1,
                'cantidad_producto' => 1,
                'id_tax' => 1,
                'precio_total' => 1,
            ],
        ];
        parent::init();
    }
}
