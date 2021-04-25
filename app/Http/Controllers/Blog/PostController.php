<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Jobs\BlogPostAfterCreateJob;
use App\Jobs\BlogPostAfterDeleteJob;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $rules = [
            'title'       => 'required|min:5|max:200',
            'slug'        => 'required|max:200',
            'content_raw' => 'required|min:5|max:200',
            'user_id'     => 'required|integer',
            'category_id' => 'required|integer',
        ];
        $validator = \Validator::make($data, $rules);
        if($validator->fails()){
            dd( $validator->errors() );
        }

        $item = (new BlogPost())->create($data);
        if ($item) {

            // Job
            //$job = new BlogPostAfterCreateJob($item);
            //$this->dispatch($job)->onQueue('post_created');
            BlogPostAfterCreateJob::dispatch($item);

            return "Created ID -> " . $item->id;
        } else {
            return "Error!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy($id)
    {
        $rules = [
            'id' => 'required|integer',
        ];
        $validator = \Validator::make(compact('id'), $rules);
        if($validator->fails()){
            dd( $validator->errors() );
        }

        $result = BlogPost::destroy($id);
        if ($result) {

            // Job
            BlogPostAfterDeleteJob::dispatch($id)->onQueue('post_deleted');

            return "Deleted ID -> " . $id;
        } else {
            return "Error!";
        }
    }
}
