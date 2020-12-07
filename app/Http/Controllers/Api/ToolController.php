<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Tool;
use Exception;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    protected $tools;

    public function __construct(Tool $tools)
    {
        $this->tools = $tools;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->tools->all());
    }

    public function getByTag($tag)
    {
        $tag = Tag::where('label', $tag)->first();
        $tools = [];
        if (!is_null($tag)) {
            $tools = $tag->tools;
        }
        foreach ($tools as $tool) {
            $tool->tags = $tool->tags()->get()->pluck('label')->toArray();
        }

        return response()->json($tools);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tool = $this->tools->create($request->all());
            $tagsId = [];
            foreach ($request->tags as $tag) {
                $id = Tag::select('id')->where('label', $tag)->first();

                if (!is_null($id)) {
                    $tagsId[] = $id->id;
                }
            }

            $tool->tags()->sync($tagsId);
            $tool->tags = $tool->tags()->get()->pluck('label')->toArray();
            return response(json_encode($tool), 201);
        } catch (Exception $e) {
            return response(json_encode($e->getMessage()), 501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Tool $tool)
    {
        return response()->json($tool);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        return response()->json($tool);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        try {
            $tool->update($request->all());

            $tagsId = [];
            foreach ($request->tags as $tag) {
                $id = Tag::select('id')->where('label', $tag)->first();

                if (!is_null($id)) {
                    $tagsId[] = $id->id;
                }
            }

            $tool->tags()->sync($tagsId);
            $tool->tags = $tool->tags()->get()->pluck('label')->toArray();

            return response(json_encode($tool), 200);

        } catch (Exception $e) {
            return response(json_encode($e->getMessage()), 501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        try {
            $tool->tags()->sync([]);
            $delete = $tool->delete();
            return response(json_encode($delete), 204);
        } catch (Exception $e) {
            return response(json_encode($e->getMessage()), 501);

        }
    }
}
