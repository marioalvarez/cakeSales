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
            <?= $this->Html->link(__('Volver | Listado de Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
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
            </fieldset>     
                <h3>Buscar Productos</h3>

                <?= $this->form->control('buscar'); ?>

                <div class="table-content">
                    <table cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('NOMBRE') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('PRECIO UNITARIO') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaProductos as $producto): ?>
                            <tr>
                                <td><?= $this->Number->format($producto->id_producto) ?></td>
                                <td><?= h($producto->nombre_producto) ?></td>
                                <td><?= $this->Number->format($producto->precio_unitario_producto) ?></td></td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('AGREGAR'), ['action' => 'add', $producto->id_producto], ['confirm' => __('Seguro de Agregar el producto # {0}?', $producto->nombre_producto)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>   
                
                <h3>Detalle de productos</h3>
                <div class="table-content2">
                    <table cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php //echo $ordenes[0] ?>                        
                        <tbody>
                        <?php if(is_array($ordenes) || is_object($ordenes)){ ?>
                            
                            <?php foreach ($ordenes as $prod): ?>   
                                <?php //foreach($prod as $fila): ?>
                                    <td><?= $prod->id_producto ?></td>
                                    <td><?= $prod->nombre_producto ?></td>
                                    <td><?= $prod->precio_unitario_producto ?></td>
                                    <td><?=  $this->Form->Control('detalles.0.cantidad_producto'); ?></td>
                                <?php //endforeach; ?> 
                                </tr>                             
                            <?php endforeach; ?> 
                           
                        <?php } else{ ?>
                            <tr>
                                <td>aun no has agregado productos al documento</td>
                            </tr>
                        <?php } ?>
                        </tbody>                       
                    </table> 
                </div>
                <br>
                <?php  
                    //echo $this->Form->control('detalles.0.id_producto',['options' => $productos]);
                    //echo $this->Form->Control('detalles.0.cantidad_producto');
                    echo $this->Form->Control('detalles.0.id_tax',['options' => $taxes]);
                    echo $this->Form->Control('detalles.0.precio_total');
                    //RESUMEN
                    echo $this->Form->control('total_factura');
                    //echo $this->Form->control('created_at');
                ?>
             
            <?= $this->Form->button(__('Crear Factura')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $('document').ready(function(){
         $('#buscar').keyup(function(){
            var searchkey = $(this).val();
            searchProducts( searchkey );
         });

        function searchProducts( keyword ){
        var data = keyword;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Facturas', 'action' => 'Search' ] ); ?>",
                    data: {keyword:data},
                    success: function( response )
                    {       
                       $( '.table-content' ).html(response);
                    }
                });
        };
    });
</script>