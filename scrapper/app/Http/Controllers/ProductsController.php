<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use App\Model\Products as AllPosts;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

//            $Posts = AllPosts::where('magaza_id', 1)->where('single_product', 1)->toSql();
//           print_r($Posts);
//           die;
        return view('PostCRUD.index');


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

        return view('PostCRUD.create');

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


        // echo $user[0];

//dd($userDe);


        //now get all user and services in one go without looping using eager loading
        //In your foreach() loop, if you have 1000 users you will make 1000 queries

        return view('PostCRUD.show', compact('Posts', 'tags'));

    }


    /**
     * Show the form for editing the specified resource.
     *     *yazdığım post sistemindne uyarlama ihtiyaca göre değiştirilebilir
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {
        $Lists = \App\Model\Products::find($id);

        $previous =  \App\Model\Products::where('id', '<', $id)->max('id');

        // get next user id
        $next =  \App\Model\Products::where('id', '>', $id)->min('id');


        return view('PostCRUD.edit', compact('Lists','id','previous','next'));
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
////https://laraveldaily.com/upload-multiple-files-laravel-5-4/
/// /// https://laracasts.com/discuss/channels/laravel/how-to-display-file-which-had-already-upload-laravel-52?page=1
/*
        $file = $request->file('media_picture');
        $destinationPath = 'uploads';


        $this->validate($request, [
            'amazon_url' => 'required',
            'post_content' => 'required',
            'media_picture' => ' mimes:jpeg,jpg,png | max:1000',
        ]);


        if ($request->hasFile('media_picture')) {
            $file = $request->media_picture;
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $file->getClientOriginalName());
        } else {
            $fileName = null;
        }


        $update_data = ['post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'media_picture' => $fileName
        ];


        AllPosts::find($id)->update($update_data);

        return redirect()->route('posts.index')
            ->with('success', 'AllPosts updated successfully');

        */





        $this->validate($request, [
            'amazon_url' => 'required',
        ]);



        $update_data = ['amazon_url' => $request->amazon_url];


        AllPosts::find($id)->update($update_data);

//        return redirect()->route('urunler.index')
//            ->with('success', 'Post updated successfully');
        $next =  \App\Model\Products::where('id', '>', $id)->min('id');
        return redirect('/urunler_amazon/'.$next.'/edit')->with('success', 'Post updated successfully');


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
