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
            <?= $this->Html->link(__('List Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="facturas form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Nueva Factura')?></legend>
                <legend class=""><?= $this->Form->control('created_at');?></legend>
                
                <?php
                    echo $this->Form->control('tipo_documento',['options' => $documentos]);
                    echo $this->Form->control('id_cliente',['options' => $clientes]);?>
                <a  rel="noopener" href=<?= $this->Url->build(['controller'=>'clientes','action'=>'add']) ?>>Agregar Cliente</a>
                <?php    
                    //echo $this->Form->control('clientes.0.rut_cliente');                    
                    //echo $this->Form->control('clientes.0.razon_social_cliente');
                    //echo $this->Form->control('clientes.0.giro_cliente');
                    //Detalle
                    echo $this->Form->control('detalles.0.id_producto',['options' => $productos]);
                    echo $this->Form->Control('detalles.0.cantidad_producto');
                    echo $this->Form->Control('detalles.0.id_tax',['options' => $taxes]);
                    echo $this->Form->Control('detalles.0.precio_total');
                    //RESUMEN
                    echo $this->Form->control('total_factura');
                    //echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
