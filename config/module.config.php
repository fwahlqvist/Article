<?php
// module/Article/config/module.config.php
return array(
  'controllers' => array(
      'invokables' => array(
          'Article\Controller\Article' => 'Article\Controller\ArticleController',
      ),
  ),
    
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
    
  'view_manager' => array(
      'template_path_stack' => array(
          'article' => __DIR__ . '/../view',
      ),
  ),
);
