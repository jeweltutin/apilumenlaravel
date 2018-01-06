<?php
 
 namespace App\Http\Controllers;
 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
 
class UsersController extends Controller{

//create new user
	public function add(Request $request){

        $request['api_token'] = str_random(60);
		$request['password'] =  app('hash')->make($request['password']);
		
		//$request['name'] = $request->input('name');
		//$request['email'] = $request->input('email');
		//$request['password'] = $request->input('password');

    	$user = User::create($request->all());
 
    	return response()->json($user);
 
	}
 
 //updates post
	public function edit(Request $request, $id){

    	$user  = User::find($id);
    	$post->update($request->all());
 
    	return response()->json($post);
	}  

//view user

    public function view($id){
        $post  = User::find($id);
        
 
        return response()->json($post);
    }


//delete user
	public function delete($id){
    	$post  = User::find($id);
    	$post->delete();
 
    	return response()->json('Removed successfully.');
	}

//list user
	public function index(){
 
    	$post  = User::all();
 
    	return response()->json($post);
 
	}
}
?>
