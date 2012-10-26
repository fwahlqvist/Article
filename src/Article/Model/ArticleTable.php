<?php
// module/Article/src/Article/Model/ArticleTable.php
namespace Article\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class ArticleTable extends AbstractTableGateway
{
    protected $table = 'article';
    
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Article());
        
        $this->initialize();
    }
    
    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function getArticle($id)
    {
        $id = (int) $id;
        
        $rowset = $this->select(array(
            'id' => $id,
        ));
        
        $row = $rowset->current();
        
        if (!$row) {
            throw new \Exception ("Could not find row $id");
        }
        
        return $row;
    }
    
    public function saveArticle(Article $article)
    {
        $data = array(
            'content' => $article->content,
            'title' =>  $article->title,
        );
        
        $id = (int) $article->id;
        
        if($id == 0) {
            $this->insert($data);
        } elseif($this->getArticle($id)) {
            $this->update(
                    $data,
                    array(
                        'id' => $id,
                   )
              );
        } else {
            throw new \Exception('Form id does not exist');
        } 
    }
    
    public function deleteArticle($id)
    {
        $this->delete(array(
            'id' => $id,
        ));
    }
}