<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \Acp\Model\Table\OrdersTable $Orders
 *
 * @method \Acp\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();

        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        $conditions = [];

        if (isset($requestQuery['id'])) {
            $conditions['status'] = $requestQuery['id'];
        }

        $this->paginate = [
            'conditions' => $conditions,
            'order' => ['id DESC'],
            'limit' => $limit,
        ];

        $orders = $this->paginate($this->Orders);
        //$orders = $this->Orders->find('all',['order' => ['id DESC']]);
        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderDetails.Products']
        ]);
        $this->loadModel('Acp.AttributeValues');
        $appointment = $this->AttributeValues->get($order->order_details[0]->attribute);

        $this->loadModel('Countries');
        $countries = $this->Countries->find('list', ['keyField' => 'id','valueField' => 'countryName'])->toArray();
        $this->set(compact('order','countries','appointment'));
    }

    public function changeStatus($id = null , $status = null){
        $this->autoRender = false;
        $order = $this->Orders->get($id);

        if ($order->status == 3) {
            $this->Flash->error(__d('acp', 'Can not change status. This order has already finished.'));
            return $this->redirect(['action' => 'view', $id]);
        }

        if ($order->status == $status) {
            $this->Flash->error(__d('acp', 'Can not change status.'));
            return $this->redirect(['action' => 'view', $id]);
        }
        $arr_status = [0,1,2,4];

        if (in_array($order->status,$arr_status)) {

            $order->status = $status;
            $orders = $this->Orders->newEntity();
            $orders = $order;
            if ($this->Orders->save($order)) {
                $this->Flash->success(__d('acp', 'Data changed.'));
                return $this->redirect(['action' => 'view', $id]);
            }

            $this->Flash->error(__d('acp', 'Can not change status.'));
        }
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $order = $this->Orders->newEntity();
    //     if ($this->request->is('post')) {
    //         $order = $this->Orders->patchEntity($order, $this->request->getData());
    //         if ($this->Orders->save($order)) {
    //             $this->Flash->success(__('The order has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The order could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('order'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $order = $this->Orders->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $order = $this->Orders->patchEntity($order, $this->request->getData());
    //         if ($this->Orders->save($order)) {
    //             $this->Flash->success(__('The order has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The order could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('order'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExcel() {
        header('Content-type: application/excel;charset=UTF-8');
        $filename = 'orders.xls';
        header('Content-Disposition: attachment; filename='.$filename);
        
        $data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
        <head>
            <!--[if gte mso 9]>
            <xml>
                <x:ExcelWorkbook>
                    <x:ExcelWorksheets>
                        <x:ExcelWorksheet>
                            <x:Name>Customers</x:Name>
                            <x:WorksheetOptions>
                                <x:Print>
                                    <x:ValidPrinterInfo/>
                                </x:Print>
                            </x:WorksheetOptions>
                        </x:ExcelWorksheet>
                    </x:ExcelWorksheets>
                </x:ExcelWorkbook>
            </xml>
            <![endif]-->
        </head>
        
        <body>';
        
        $orders = $this->Orders->find('all');
        $data .= '
        
        
        <table style="border:1px solid #ccc;" >
                    <tr style="background:#ccc;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>';
                $i = 1;
                foreach($orders as $order)
                {
                    $data .=    '
                    <tr>
                        <td>'. $i .'</td>
                        <td>'. $order->name. '</td>
                        <td>'. $order->email. '</td>
                    </tr>';
                $i++;
                }
                $data .= '
            </table>';
        
        $data .= '</body></html>';
        //mb_convert_encoding($data, 'UTF-16LE', 'UTF-8');
        echo $data;
        $this->autoRender = false;
    }
}
