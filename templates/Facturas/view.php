<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Editar Factura'), ['action' => 'edit', $factura->id_venta], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Factura'), ['action' => 'delete', $factura->id_venta], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id_venta), 'class' => 'side-nav-item']) ?>
            
            <?= $this->Html->link(__('Nueva Factura'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Volver | Listado de Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="facturas view content">
            <h3>Folio Factura: <?= h($factura->id_venta) ?></h3>
            <table>
                <tr>
                    <th><?= __('Folio') ?></th>
                    <td><?= $this->Number->format($factura->id_venta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Documento') ?></th>
                    <td><?= $this->Number->format($factura->tipo_documento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Cliente') ?></th>
                    <td><?= $this->Number->format($factura->id_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Factura') ?></th>
                    <td><?= $this->Number->format($factura->total_factura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creada el') ?></th>
                    <td><?= h($factura->created_at) ?></td>
                </tr>
            </table>
            </br>
            <h3><?= __('Detalle de Productos') ?></h3>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">IMPUESTO</th>
                        <th scope="col">TOTAL PRODUCTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($factura->detalles as $detalle): ?>
                    <tr>
                        <td><?= $this->Number->format($detalle->id_detalle) ?></td>
                        <td><?= h($detalle->id_producto) ?></td>
                        <td><?= h($detalle->cantidad_producto) ?></td>
                        <td><?= h($detalle->id_tax) ?></td>
                        <td><?= h($detalle->precio_total) ?></td>                
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

    
