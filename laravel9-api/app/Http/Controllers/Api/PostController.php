<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

//dipakai untuk post
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    //get
        /**
         * index
         * 
         * @return void
         */
        public function index() {
            //get posts
            $posts = Post::latest()->paginate(5);

            //return collection of posts as a resource
            return new PostResource(true, 'List Data Posts', $posts);
        }
    // get

    //store(add)
        /**
         * store
         * 
         * @param mixed $request
         * @return void
         */
        public function store(Request $request){
            //mendefinisakn peraturan validasi
            $validator = Validator::make($request->all(),[
                'image' => 'required|image|mimes:jpeg,png,gif,svg|max:2048',
                'title' => 'required',
                'content' => 'required',
            ]);

            //cek kalau validasi gagal
            if($validator->fails()){
                return response()->json($validator->errors(),442);
            }

            //upload gambar
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //unggah post ke database
            $post = Post::create([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

            //respon setelah berhasil
            return new PostResource(true, 'Data berhasil dibuat', $post);
        }
    //add

    //detail
        /**
         * show
         * 
         * @param mixed $post
         * @return void
         */
        public function show(Post $post){
            //menampilkan sebuah post dari sumber data
            return new PostResource(true, 'Data ditemukan', $post);
        }
    //detail
}
