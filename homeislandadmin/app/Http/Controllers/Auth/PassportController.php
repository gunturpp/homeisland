<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\News;
use App\Explore;
use App\Event;
use App\Souvenir;
use App\Review;
use App\Booking;
use App\Homestay;
use App\Bank;
use App\Rating;

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
				$explores = Explore::Where('kabupaten','like','%'.$string.'%')->orderBy('id', 'nama_tempat')->get();
			else

				$explores = Explore::orderBy('id', 'nama_tempat')->get();
			$status=true;
			return compact('status','explores');
	}
	public function getBank(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$banks = Bank::Where('id_homestay','like','%'.$string.'%')->orderBy('id', 'jenis_bank')->get();
			else

				$banks = Bank::orderBy('id', 'jenis_bank')->get();
			$status=true;
			return compact('status','banks');
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
	
	public function getBookings(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$bookings = Booking::Where('id_homestay','like','%'.$string.'%')->orderBy('id', 'created_at')->get();
			else

				$bookings = Booking::orderBy('id', 'created_at')->get();
			$status=true;
			return compact('status','bookings');
	}
	public function getRatings(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = Auth::user();
			if($string!=null)
				$ratings = Rating::Where('id_user','like','%'.$string.'%')->orderBy('id', 'created_at')->get();
			else

				$ratings = Rating::orderBy('id', 'created_at')->get();
			$status=true;
			return compact('status','ratings');
	}
	
	
	public function postBookings(Request $request)
		{
		$token = $request->header('Authorization');
		$user = Auth::user();
		
		// die($token);
		// $data = $request->all();
		// die($data);
		if($token!=null){
		
				// if (isset($request['id_homestay']) && isset($request['status']) && isset($request['kode_booking'])
				// 				&& isset($request['id_user']) 
				// 				&& isset($request['total_price'])){
				// $data = $request->only('id_user');
				// $data->id = $request->input("id");
				$data->id_user = $user->email;
				$data->kode_booking = $request->input("kode_booking");
				$kode = substr(md5(uniqid(mt_rand(), true)) , 0, 10);
				$data->kode_booking = $kode;
				$data->total_price = $request->input("total_price");
				$data->status = $request->input("status");
				$data->save();
				$message = "success add order";
				// }
				// else{
				// 	$message = "parameter not complete";
				// }
		}
		else {
			$message = "no user detected";
		}
		return compact('users','bookings', 'message');
	}
}
