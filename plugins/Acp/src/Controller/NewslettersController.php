<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

/**
 * Newsletters Controller
 *
 * @property \Acp\Model\Table\NewslettersTable $Newsletters
 *
 * @method \Acp\Model\Entity\Newsletter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewslettersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['Newsletters.id' => 'DESC'],
            'maxLimit' => 10
        ];
        $newsletters = $this->paginate($this->Newsletters);

        $this->set(compact('newsletters'));
    }

    /**
     * View method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsletter = $this->Newsletters->get($id);
        if ($newsletter->has_read == 0){
            $newsletter->has_read = 1;
            $this->Newsletters->save($newsletter);
        }
        $this->set('newsletter', $newsletter);
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('The newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExcel() {
        header('Content-type: application/excel;charset=UTF-8');
        $filename = 'newsletters.xls';
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
        
        $newsletters = $this->Newsletters->find('all');
        $data .= '
        
        
        <table style="border:1px solid #ccc;" >
                    <tr style="background:#ccc;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>';
                $i = 1;
                foreach($newsletters as $newsletter)
                {
                    $data .=    '
                    <tr>
                        <td>'. $i .'</td>
                        <td>'. $newsletter->name. '</td>
                        <td>'. $newsletter->email. '</td>
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
