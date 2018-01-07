<?php
 
namespace App\Http\Controllers;
 
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class PostsController extends Controller{

	/*public function __construct()
    {
        $this->middleware('auth');  //For all functionality need authentication
        $this->middleware('auth',['only' => ['edit','delete']]);  

        $this->middleware('log', ['only' => [
            'fooAction',
            'barAction',
        ]]);

        $this->middleware('subscribed', ['except' => [
            'fooAction',
            'barAction',
        ]]);
    }*/


//create new post
	public function createPost(Request $request){
 
    	$post = Post::create($request->all());
 
    	return response()->json($post);
 
	}
 
 //updates post
	public function updatePost(Request $request, $id){

    	$post  = Post::find($id);
    	$post->title = $request->input('title');
    	$post->body = $request->input('body');
    	$post->views = $request->input('views');
    	$post->save();
 
    	return response()->json($post);
	}  

//view post

    public function viewPost($id){
        $post  = Post::find($id);

		return response()->json($post);
		//return User::findOrFail($id);
    }


//delete post
	public function deletePost($id){
    	$post  = Post::find($id);
    	$post->delete();
 
    	return response()->json('Removed successfully.');
	}

//list post
	public function index(){
 
    	$post  = Post::all();
 
    	return response()->json($post);
 
	}
}
?>
