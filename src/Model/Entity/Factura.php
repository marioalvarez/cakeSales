<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factura Entity
 *
 * @property int $id_venta
 * @property int $tipo_documento
 * @property int $id_cliente
 * @property string $total_factura
 * @property \Cake\I18n\FrozenDate $created_at
 */
class Factura extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tipo_documento' => true,
        'id_cliente' => true,
        'total_factura' => true,
        'created_at' => true,
        'cliente' => true,
        'tax' => true,
        'documento' => true,
        'detalles' => true,
        'productos' => true,
    ];
}
