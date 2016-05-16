<?php

namespace Leoalmar\CodeTags\Tests\Models;


use Leoalmar\CodeTags\Models\Tag;
use Leoalmar\CodeTags\Tests\AbstractTestCase;

class TagTest extends AbstractTestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted()
    {
        $tag = Tag::create(['name' => 'php','taggable_id' => 1, 'taggable_type' => 'App\User']);
        $this->assertEquals('php', $tag->name);

        $tagList = Tag::all();
        $this->assertCount(1,$tagList);
    }
}