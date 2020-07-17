<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id_cliente], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id_cliente], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id_cliente), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientes view content">
            <h3><?= h($cliente->razon_social_cliente) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rut Cliente') ?></th>
                    <td><?= h($cliente->rut_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Razon Social Cliente') ?></th>
                    <td><?= h($cliente->razon_social_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Giro Cliente') ?></th>
                    <td><?= h($cliente->giro_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo Cliente') ?></th>
                    <td><?= h($cliente->correo_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Cliente') ?></th>
                    <td><?= $this->Number->format($cliente->id_cliente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($cliente->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
