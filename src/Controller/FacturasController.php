<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Session;
/**
 * Facturas Controller
 *
 * @property \App\Model\Table\FacturasTable $Facturas
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasController extends AppController
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $session = $this->getRequest()->getSession();
        
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $facturas = $this->paginate($this->Facturas);
        
        $session->destroy();

        $this->set(compact('facturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => ['Detalles'],
        ]);

        $this->set(compact('factura','detalles'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = NULL)
    {   
        $session = $this->getRequest()->getSession();
        $ordenes = [];
        
        
        #Carga de productos
        $this->loadModel('Productos');
        
        #agrega productos a la orden
        
       
        if ($id != NULL){
            #traemos los productos
            $prod = $this->Productos->get($id, [
                'contain' => [],
            ]);
            #traemos de la session los productos
            $data = $session->read('producto');
            #agregamos el nuevo elemento
            $data[] = $prod;
            #enviamos el merge
            $session->write('producto', $data);
            #advertimos al usuario
            $this->Flash->success(__('Producto Agregado.')); 
            #volvemos al sitio de origen
            return $this->redirect($this->referer());
        }

        #Carga de productos
        $listaProductos = $this->Productos->find('all');
        
        $factura = $this->Facturas->newEmptyEntity();
        if ($this->request->is('post')) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura, [
                'associated' => ['Detalles']
            ])){
                $this->Flash->success(__('La Factura se creo con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ups!, La Factura no se creo. Por Favor, intenta nuevamente.'));
        }
                
        $ordenes = $session->read('producto');

        $clientes = $this->Facturas->Clientes->find('list',['limit'=> 200]); 
        $taxes = $this->Facturas->Taxes->find('list',['limit'=> 200]); 
        $documentos = $this->Facturas->Documentos->find('list',['limit'=> 200]); 
        $productos = $this->Facturas->Productos->find('list'); 
        $this->set(compact('factura','clientes','documentos','taxes','productos','listaProductos','ordenes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factura = $this->Facturas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('La Factura se edito con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ups!, La Factura no se modifico. Por Favor, intenta nuevamente.'));
        }
        $this->set(compact('factura'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factura = $this->Facturas->get($id);
        if ($this->Facturas->delete($factura)) {
            $this->Flash->success(__('La Factura se elimino con exito.'));
        } else {
            $this->Flash->error(__('Ups!, La Factura no se logro eliminar. Por Favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $keyword.
     */
    public function search()
    {
        $this->request->allowMethod('ajax');
        $keyword = $this->request->query('keyword');
        $this->loadModel('Productos');
        
        $query = $this->Productos->find('all',[
            'conditions' => ['nombre_producto LIKE' => '%'.$keyword.'%'],
            'order' => ['Productos.id_producto'=>'DESC'],
            'limit' => 10            
            ]);

        $this->set('productos', $this->paginate($query));
        $this->set('_serialize', ['productos']);
    }

    public function array_push_assoc(array $arrayDatos, array $values)
    {
        return $arrayDatos = array_merge($arrayDatos, $values);
    }

   
}
