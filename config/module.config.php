<?php
// module/Article/config/module.config.php
return array(
  'controllers' => array(
      'invokables' => array(
          'article' => 'Article\Controller\ArticleController',
      ),
  ),
 /*   
  'router' => array(
      'routes' => array(
          'article' => array(
              'type' => 'segment',
              'options' => array(
                  'route' => '/article[/:action][/:id]',
                  'constraints' => array(
                      'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      //'title' => '[a-zA-Z][a-zA-Z0-9_-]*',
                  ),
                  'defaults' => array(
                      'controller' => 'Article\Controller\Article',
                      'action' => 'index', 
                  ),
              ),
          ),
      ),
  ),  
  */
    
  'router' => array(
      'routes' => array(
          'article' => array(
              'type' => 'Literal',
              'prioirty' => 1000,
              'options' => array(
                  'route' => '/article',
                  'defaults' => array(
                      'controller' => 'article',
                      'action' => 'index',
                  ),
              ),
              'may_terminate' => 'true',
              'child_routes' => array(
                  'view' => array(
                      'type' => 'segment',
                      'options' => array(
                          'route' => '/view[/:id]',
                          'defaults' => array(
                              'controller' => 'article',
                              'action' => 'view',
                          ),
                      ), 
                  ),
                  'add' => array(
                      'type' =>'Literal',
                      'options' => array(
                          'route' => '/add',
                          'defaults' => array(
                              'controller' => 'article',
                              'action' => 'add',
                          ),
                      ),
                  ),
                  'edit' => array(
                      'type' => 'segment',
                      'options' => array(
                          'route' => '/edit[/:id]',
                          'defaults' => array(
                              'controller' => 'article',
                              'action' => 'edit',
                          ),
                      ),
                  ),
                  'delete' => array(
                      'type' => 'segment',
                      'options' => array(
                          'route' => '/delete[/:id]',
                          'defaults' => array(
                              'controller' => 'article',
                              'action' => 'delete',
                          ),
                      ),
                  ),
              ),    
          ),
      ),
  ),    
  'view_manager' => array(
      'template_path_stack' => array(
          'article' => __DIR__ . '/../view',
      ),
  ),
);
