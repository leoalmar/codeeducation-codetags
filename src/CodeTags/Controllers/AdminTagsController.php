<?php

namespace Leoalmar\CodeTags\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Leoalmar\CodeTags\Models\Tag;

class AdminTagsController extends Controller
{

    /**
     * @var ResponseFactory
     */
    private $response;
    /**
     * @var Tag
     */
    private $tag;

    public function __construct(ResponseFactory $response, Tag $tag)
    {
        $this->response = $response;
        $this->tag = $tag;
    }
    
    public function index()
    {
        $tags = $this->tag->all();
        return $this->response->view('codetags::index', compact('tags'));
    }

    public function create()
    {
        $tags = $this->tag->all()->lists('name','id')->toArray();
        return $this->response->view('codetags::create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->tag->create($request->all());
        return redirect()->route('admin.tags.index');
    }


}