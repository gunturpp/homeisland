<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\News;
use App\Explore;
use App\Event;
use App\Souvenir;
use App\Review;
use App\Booking;
use App\Homestay;

use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
class PassportController extends Controller
{
    public $successStatus = 200;
  
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password'
        => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success],
            $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'],
            401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'hp' => 'required|min:10|max:13',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->
            errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // $input['remember_token'] = $user->createToken('MyApp')->accessToken;
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success'=>$success], $this->successStatus);

    }

    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success'=>$user], $this->successStatus);
    }

    public function getNews(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$newss = News::Where('judul','like','%'.$string.'%')->orderBy('id', 'deskripsi')->get();
			else

				$newss = News::orderBy('id', 'deskripsi')->get();
			$status=true;
			return compact('status','newss');
    }
    public function getExplores(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$newss = Explore::Where('judul','like','%'.$string.'%')->orderBy('id', 'deskripsi')->get();
			else

				$newss = Explore::orderBy('id', 'deskripsi')->get();
			$status=true;
			return compact('status','explores');
    }
    public function getHomestays(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$homestays = Homestay::Where('nama_homestay','like','%'.$string.'%')->orderBy('id', 'deskripsi')->get();
			else

				$homestays = Homestay::orderBy('id', 'harga')->get();
			$status=true;
			return compact('status','homestays');
    }
    public function getEvents(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$events = Event::Where('judul','like','%'.$string.'%')->orderBy('id', 'deskripsi')->get();
			else

				$events = Event::orderBy('id', 'deskripsi')->get();
			$status=true;
			return compact('status','events');
    }
    public function getSouvenirs(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$souvenirs = Souvenir::Where('nama_toko','like','%'.$string.'%')->orderBy('id')->get();
			else

				$souvenirs = Souvenir::orderBy('id')->get();
			$status=true;
			return compact('status','souvenirs');
    }
    public function getReviews(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$reviews = Review::Where('id_user','like','%'.$string.'%')->orderBy('id','id_user')->get();
			else

				$reviews = Review::orderBy('id','id_user')->get();
			$status=true;
			return compact('status','reviews');
    }    

}
