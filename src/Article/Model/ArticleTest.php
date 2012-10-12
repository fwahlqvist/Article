<?php
// tests/Module/Article/src/Article/Model/ArticleTest.php
namespace Article\Module;

use PHPUnit_Framework_TestCase;

class ArticleTest extends PHPUnit_Framework_TestCase
{
    public function testArticleIntialState()
    {
        $article = new Article();
        
        $this->assertNull($article->content, '"content" should initially be null');
        $this->assertNull($id->id, '"id" should initially be null');
        $this->assertNull($title->title, '"title" should initially be null');
    }
    
    public function testExchangeArraySetPropertiesCorrectly()
    {
        $article = new Article();
        $data = array('content' => 'some content',
                        'id' => 123,
                        'title' => 'some title');
        
        $article->exchangeArray($data);
        
        $this->assertSame($data['content'], $article->content, '"content" was not set correctly');
        $this->assertSame($data['id'], $article->id, '"id" was not set correctly');
        $this->assertSame($data['title'], $article->title, '"title" was not set correctly');
    }
    
    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $article = new Article();

        $article->exchangeArray(array('content' => 'some content',
                                    'id'     => 123,
                                    'title'  => 'some title'));
        $article->exchangeArray(array());

        $this->assertNull($article->content, '"content" should have defaulted to null');
        $this->assertNull($article->id, '"title" should have defaulted to null');
        $this->assertNull($article->title, '"title" should have defaulted to null');
    }

}