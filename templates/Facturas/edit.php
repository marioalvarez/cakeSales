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
                __('Delete'),
                ['action' => 'delete', $factura->id_venta],
                ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id_venta), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="facturas form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Edit Factura') ?></legend>
                <?php
                    echo $this->Form->control('tipo_documento');
                    echo $this->Form->control('id_cliente');
                    echo $this->Form->control('total_factura');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
