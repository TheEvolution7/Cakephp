<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizzesController extends AppController
{
    
    public function view($id = null)
    {
        $quiz = $this->Quizzes->get($id, ['contain' => ['QuizQuestions' => ['QuizAnswers']]]);

        $this->set(compact('quiz'));
    }
}