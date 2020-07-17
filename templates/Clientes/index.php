<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<div class="clientes index content">
    <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clientes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_cliente') ?></th>
                    <th><?= $this->Paginator->sort('rut_cliente') ?></th>
                    <th><?= $this->Paginator->sort('razon_social_cliente') ?></th>
                    <th><?= $this->Paginator->sort('giro_cliente') ?></th>
                    <th><?= $this->Paginator->sort('correo_cliente') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $this->Number->format($cliente->id_cliente) ?></td>
                    <td><?= h($cliente->rut_cliente) ?></td>
                    <td><?= h($cliente->razon_social_cliente) ?></td>
                    <td><?= h($cliente->giro_cliente) ?></td>
                    <td><?= h($cliente->correo_cliente) ?></td>
                    <td><?= h($cliente->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id_cliente]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id_cliente]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->id_cliente], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id_cliente)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
