<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detalle Entity
 *
 * @property int $id_detalle
 * @property int|null $id_factura
 * @property int|null $id_producto
 * @property int|null $cantidad_producto
 * @property int|null $id_tax
 * @property int|null $precio_total
 */
class Detalle extends Entity
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
        'id_factura' => true,
        'id_producto' => true,
        'cantidad_producto' => true,
        'id_tax' => true,
        'precio_total' => true,
    ];
}
