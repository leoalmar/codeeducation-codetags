<?php

namespace Leoalmar\CodeTags\Tests\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Leoalmar\CodeTags\Controllers\Controller;
use Leoalmar\CodeTags\Controllers\AdminTagsController;
use Leoalmar\CodeTags\Models\Tag;
use Leoalmar\CodeTags\Tests\AbstractTestCase;
use Mockery as M;

class AdminTagsControllerTest extends AbstractTestCase
{
    
    public function test_should_extend_from_controller()
    {
        $category = M::mock(Tag::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminTagsController($responseFactory,$category);

        $this->assertInstanceOf(Controller::class, $controller);
    }
        
    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $tag = M::mock(Tag::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminTagsController($responseFactory,$tag);

        $html = M::mock();

        $tagsResults = ['PHP','JS'];

        $tag->shouldReceive('all')->andReturn($tagsResults);

        $responseFactory->shouldReceive('view')
            ->with('codetags::index', ['tags'=>$tagsResults])
            ->andReturn($html)
        ;

        $this->assertEquals($controller->index(), $html);
    }
}