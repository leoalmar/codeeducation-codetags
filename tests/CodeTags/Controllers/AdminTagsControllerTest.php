<?php

namespace Leoalmar\CodeTags\Tests\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Leoalmar\CodeTags\Repository\TagRepository;
use Leoalmar\CodeTags\Controllers\Controller;
use Leoalmar\CodeTags\Controllers\AdminTagsController;
use Leoalmar\CodeTags\Models\Tag;
use Leoalmar\CodeTags\Tests\AbstractTestCase;
use Mockery as M;

class AdminTagsControllerTest extends AbstractTestCase
{
    
    public function test_should_extend_from_controller()
    {
        $repository = M::mock(TagRepository::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminTagsController($responseFactory,$repository);

        $this->assertInstanceOf(Controller::class, $controller);
    }
        
    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $repository = M::mock(TagRepository::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminTagsController($responseFactory,$repository);

        $html = M::mock();

        $results = ['PHP','JS'];

        $repository->shouldReceive('all')->andReturn($results);

        $responseFactory->shouldReceive('view')
            ->with('codetags::index', ['tags'=>$results])
            ->andReturn($html)
        ;

        $this->assertEquals($controller->index(), $html);
    }
}