<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id_cliente
 * @property string $rut_cliente
 * @property string|null $razon_social_cliente
 * @property string|null $giro_cliente
 * @property string $correo_cliente
 * @property \Cake\I18n\FrozenDate $created_at
 */
class Cliente extends Entity
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
        'rut_cliente' => true,
        'razon_social_cliente' => true,
        'giro_cliente' => true,
        'correo_cliente' => true,
        'created_at' => true,
    ];
}
