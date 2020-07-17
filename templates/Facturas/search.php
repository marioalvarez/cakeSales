<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO UNITARIO</th>
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