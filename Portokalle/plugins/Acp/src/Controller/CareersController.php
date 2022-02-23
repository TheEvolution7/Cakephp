<?php
namespace Acp\Controller;

use Acp\Controller\AppController;


class CareersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['Careers.id' => 'DESC'],
            'maxLimit' => 10
        ];
        $careers = $this->paginate($this->Careers->find('all')->contain(['Articles']));

        $this->set(compact('careers'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $career = $this->Careers->get($id);
        if ($this->Careers->delete($career)) {
            $this->Flash->success(__('The career has been deleted.'));
        } else {
            $this->Flash->error(__('The career could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExcel() {
        header('Content-type: application/excel;charset=UTF-8');
        $filename = 'careers.xls';
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
        
        $careers = $this->Careers->find('all');
        $data .= '
        
        
        <table style="border:1px solid #ccc;" >
                    <tr style="background:#ccc;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>File</th>
                        <th>Content</th>
                    </tr>';
                $i = 1;
                foreach($careers as $career)
                {
                    $data .=    '
                    <tr>
                        <td>'. $i .'</td>
                        <td>'. $career->name. '</td>
                        <td>'. $career->email. '</td>
                        <td>'. $career->file. '</td>
                        <td>'. $career->content. '</td>
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
