<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use App\Model\ProductsFa as AllPosts;

class ProductsFAController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        return view('funagainCRUD.index');


    }

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin()
    {
        return view('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {

        return view('funagainCRUD.create');

    }


    /**
     * Store a newly created resource in storage.
     *yazdığım post sistemindne uyarlama ihtiyaca göre değiştirilebilir
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'post_title' => 'required',

            'post_content' => 'required',

        ]);

        $update_data = ['post_title' => $request->post_title,
            'post_content' => $request->post_content,
        ];

        //  AllPosts::create($request->all());
        $task = AllPosts::create($update_data);

        $explode = explode(',', $request->get('tags'));
        foreach ($explode as $exp) {
            $task->tags()->create([
                'name' => $exp,
            ]);
        }


        return redirect()->route('posts.index')
            ->with('success', 'Post edited successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, Request $request)

    {

        $Posts = AllPosts::find($id);

        $tags = ($Posts->pictures()->get());

        return view('funagainCRUD.show', compact('Posts', 'tags'));

    }


    /**
     * Show the form for editing the specified resource.
     *     *yazdığım post sistemindne uyarlama ihtiyaca göre değiştirilebilir
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {
        $Lists = \App\Model\ProductsFa::find($id);

        $previous = \App\Model\ProductsFa::where('id', '<', $id)->max('id');

        // get next user id
        $next = \App\Model\ProductsFa::where('id', '>', $id)->min('id');


        return view('funagainCRUD.edit', compact('Lists', 'id', 'previous', 'next'));
    }


    /**
     * Update the specified resource in storage.
     *     *yazdığım post sistemindne uyarlama ihtiyaca göre değiştirilebilir
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)

    {


        $this->validate($request, [
            'funagain_url' => 'required',
        ]);


        $update_data = ['funagain_url' => $request->funagain_url];


        AllPosts::find($id)->update($update_data);

        $next = \App\Model\ProductsFa::where('id', '>', $id)->min('id');
        return redirect('/urunler_funagain/' . $next . '/edit')->with('success', 'Post updated successfully');


    }


    /**
     * Remove the specified resource from storage.
     *     *yazdığım post sistemindne uyarlama ihtiyaca göre değiştirilebilir
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)

    {

        AllPosts::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'AllPosts deleted successfully');

    }
}
