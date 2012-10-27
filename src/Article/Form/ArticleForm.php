<?php
// module/Article/src/Article/Form/ArticleForm.php
namespace Article\Form;

use Zend\Form\Form;

class ArticleForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore named passed
        parent::__construct('article');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),    
        ));
        
       
        
        $this->add(array(
            'name' => 'content',
            'attributes' => array(
                'type' => 'textarea',
                'rows' => 10,
                'id'   => 'content',
            ),
            'options' => array(
                'label' => 'Content',
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}