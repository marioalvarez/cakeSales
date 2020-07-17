<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id_producto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id_producto], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id_producto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productos view content">
            <h3><?= h($producto->id_producto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Producto') ?></th>
                    <td><?= h($producto->nombre_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Producto') ?></th>
                    <td><?= $this->Number->format($producto->id_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio Unitario Producto') ?></th>
                    <td><?= $this->Number->format($producto->precio_unitario_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Producto') ?></th>
                    <td><?= $this->Number->format($producto->costo_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($producto->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
