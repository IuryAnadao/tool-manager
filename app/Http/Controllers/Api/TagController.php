<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tags;

    public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->tags->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TagCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        try {
            $tag = $this->tags->create($request->only('name', 'label'));

            return response(json_encode($tag), 201);
        } catch (Exception $e) {

            return response(json_encode($e->getMessage()), 501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response()->json($tag);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return response()->json($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TagUpdateRequest  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->all());
            return response(json_encode($tag), 200);

        } catch (Exception $e) {
            return response(json_encode($e->getMessage()), 501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            $delete = $tag->delete();
            return response(json_encode($delete), 204);
        } catch (Exception $e) {
            return response(json_encode($e->getMessage()), 501);

        }
    }
}
