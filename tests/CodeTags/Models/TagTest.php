<?php

namespace Leoalmar\CodeTags\Tests\Models;


use Illuminate\Validation\Validator;
use Leoalmar\CodeTags\Models\Tag;
use Leoalmar\CodeTags\Tests\AbstractTestCase;
use Mockery as M;

class TagTest extends AbstractTestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_inject_validator_in_tag_model()
    {
        $tag = new Tag();
        $validator = M::mock(Validator::class);
        $tag->setValidator($validator);

        $this->assertEquals($tag->getValidator(), $validator);
    }

    public function test_should_check_if_it_is_valid_when_it_is()
    {
        $tag = new Tag();
        $tag->name = "Tag1";

        $validator = M::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name'=>'required|max:255']);
        $validator->shouldReceive('setData')->with(['name'=>'Tag1']);
        $validator->shouldReceive('fails')->andReturn(false);

        $tag->setValidator($validator);

        $this->assertTrue( $tag->isValid() );
    }

    public function test_should_check_if_it_is_invalid_when_it_is()
    {
        $tag = new Tag();
        $tag->name = "Tag";

        $messageBag = M::mock(MessageBag::class);

        $validator = M::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name'=>'required|max:255']);
        $validator->shouldReceive('setData')->with(['name'=>'Tag']);
        $validator->shouldReceive('fails')->andReturn(true);

        $validator->shouldReceive('errors')->andReturn($messageBag);

        $tag->setValidator($validator);

        $this->assertFalse($tag->isValid());
        $this->assertEquals($messageBag, $tag->errors);
    }
    
    public function test_check_if_a_category_can_be_persisted()
    {
        $tag = Tag::create(['name' => 'php','taggable_id' => 1, 'taggable_type' => 'App\User']);
        $this->assertEquals('php', $tag->name);

        $tagList = Tag::all();
        $this->assertCount(1,$tagList);
    }

}