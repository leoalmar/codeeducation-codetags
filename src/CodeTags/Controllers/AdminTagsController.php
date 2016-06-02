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

    /**
     * AdminTagsController constructor.
     * @param ResponseFactory $response
     * @param Tag $tag
     */
    public function __construct(ResponseFactory $response, Tag $tag)
    {
        $this->response = $response;
        $this->tag = $tag;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->all();
        return $this->response->view('codetags::index', compact('tags'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tag->all()->lists('name','id')->toArray();
        return $this->response->view('codetags::create', compact('tags'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->tag->create($request->all());
        return redirect()->route('admin.tags.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tag = $this->tag->find($id);
        return $this->response->view('codetags::edit', compact('tag'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['active'] = isset($data['active']);
        $this->tag->find($id)->update($data);
        return redirect()->route('admin.tags.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $this->tag->destroy($id);
        return redirect()->route('admin.tags.index');
    }

}