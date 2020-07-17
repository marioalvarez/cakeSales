<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura[]|\Cake\Collection\CollectionInterface $facturas
 */
?>
<div class="facturas index content">
    <?= $this->Html->link(__('Nueva Factura'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Facturas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_venta') ?></th>
                    <th><?= $this->Paginator->sort('tipo_documento') ?></th>
                    <th><?= $this->Paginator->sort('id_cliente') ?></th>
                    <th><?= $this->Paginator->sort('total_factura') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?= $this->Number->format($factura->id_venta) ?></td>
                    <td><?= $this->Number->format($factura->tipo_documento) ?></td>
                    <td><?= $this->Number->format($factura->id_cliente) ?></td>
                    <td><?= $this->Number->format($factura->total_factura) ?></td>
                    <td><?= h($factura->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('VER'), ['action' => 'view', $factura->id_venta]) ?>
                        <?= $this->Html->link(__('EDITAR'), ['action' => 'edit', $factura->id_venta]) ?>
                        <?= $this->Form->postLink(__('ELIMINAR'), ['action' => 'delete', $factura->id_venta], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id_venta)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} factura(s) de un total de {{count}} facturas')) ?></p>
    </div>
</div>
