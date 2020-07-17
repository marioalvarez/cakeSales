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

       $a=0;
        if ($id != NULL){
            $data = $this->Productos->get($id, [
                'contain' => [],
            ]);
            // agrego productos 
            /*      
            for ($i=0; $i < 10; $i++) { 
                $datos[$i][] = $data;
            }
            */
            //$data = $session->read();
            //$data[] = ('id' -> $id);
            
            //$_SESSION['data'][] = $data;

            while ($a <= 10) {
                $datos[$a][] = $data;
            
            
            
            $session->write('producto',$datos);
            
            
            #Advierte y Redirige
            $this->Flash->success(__('Producto Agregado.')); 
            $a = $a + 1; 
            }
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
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The factura has been deleted.'));
        } else {
            $this->Flash->error(__('The factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   
}