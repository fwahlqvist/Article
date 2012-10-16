<?php
// module/Article/src/Article/Controller/ArticleController.php
namespace Article\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Article\Model\Article;
use Article\Form\ArticleForm;

class ArticleController extends AbstractActionController
{
    protected $articleTable;
    
    public function getArticleTable()
    {
        if(!$this->articleTable){
            $sm = $this->getServiceLocator();
            $this->articleTable = $sm->get('Article\Model\ArticleTable');
        }
        return $this->articleTable; 
    }
    
    
    public function indexAction()
    {
        return new viewModel(array(
            'articles' => $this->getArticleTable()->fetchAll(),
        ));
    }
    
    public function viewAction()
    {  
        $title = $this->params()->fromRoute('title', '');
        if(!$title) {
            return $this->redirect()->toRoute('article');
        }   
    return array(
            'article' => $this->getArticleTable()->getArticle($title),
        );
        
    }    
    public function addAction()
    {
        $form = new ArticleForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()){
            $article = new Article();
            $form->setInputFilter($article->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()){
                $article->exchangeArray($form->getData());
                $this->getArticleTable()->saveArticle($article);
                
                // redirect to list of articles
                return $this->redirect()->toRoute('article');
            }
        }
        
        return array('form' => $form);
    }
    
    public function editAction()
    {
        $title = $this->params()->fromRoute('title', '');
        if(!$title) {
            return $this->redirect()->toRoute('article', array(
                'action' => 'add'
            ));
        }
        
        $article = $this->getArticleTable()->getArticle($title);
        
        $form = new ArticleForm();
        $form->bind($article);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setInputFilter($article->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid()) {
                $this->getArticleTable()->saveArticle($form->getData());
                
                // redirect to list of Articles
                return $this->redirect()->toRoute('article');
            }
        }
        
        return array(
            'title' => $title,
            'form' => $form,
        );
    }
    
    
 
    
    
    public function deleteAction()
    {
        $title = $this->params()->fromRoute('title', '');
        if(!$title) {
            return $this->redirect()->toRoute('article');
        }
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $title = $request->getPost('title');
                $this->getArticleTable()->deleteArticle($title);
            }
            
            // redirect to list of articles
            return $this->redirect()->toRoute('article');
        }
        
        return array(
            'title' => $title,
            'article' => $this->getArticleTable()->getArticle($title)
        );      
    }
    
}