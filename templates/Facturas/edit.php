<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $factura->id_venta],
                ['confirm' => __('Estas seguro de eliminar la factura N# {0}?', $factura->id_venta), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Volver | Listado de Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="facturas form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Editar Factura') ?></legend>
                <?php
                    echo $this->Form->control('tipo_documento');
                    echo $this->Form->control('id_cliente');
                    echo $this->Form->control('total_factura');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
