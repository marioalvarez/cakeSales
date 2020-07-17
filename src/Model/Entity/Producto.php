<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id_producto
 * @property string|null $nombre_producto
 * @property int|null $precio_unitario_producto
 * @property int|null $costo_producto
 * @property \Cake\I18n\FrozenDate $created_at
 */
class Producto extends Entity
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
        'nombre_producto' => true,
        'precio_unitario_producto' => true,
        'costo_producto' => true,
        'created_at' => true,
    ];
}
