<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Admin;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        $user = Auth::user();
		if($user->cakupan=='daerah' || $user->cakupan=='pusat' ){
			$newss = DB::table('newss')->count();
        }
        else {
            return 'salah';
        }
        // $newss = News::latest()->paginate(5);
        $newss = DB::table('newss')->where('admin', $user->email)->latest()->paginate(5);
        return view('news.index',compact('newss', 'admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        request()->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('judul','deskripsi', 'foto', 'admin');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/news";
                $data['foto'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;
            }

        News::create($data);
        return redirect()->route('news.index')
            ->with('success','New news has been created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newss = News::find($id);
        return view('news.show',compact('newss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newss = News::find($id);
        return view('news.edit',compact('newss'));
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
        $user = Auth::user();
        request()->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|mimes:jpeg,png,jpg|max:15000',
            ]);
            $data = $request->only('judul','deskripsi', 'foto');
            
            // $data = $request->except(['image']);
            $photo1 = "";
            if ($request->hasFile('foto')){ //has file itu meminta nama databasenya bukan classnya
                $ip = request()->ip();
                $file = $request->foto;
                $fileName = str_random(40) . '.' . $file->guessClientExtension();;
                $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
                $destinationPath = "images/news";
                $data['foto'] = '../'. $destinationPath . '/' . $fileName;
                $file -> move($destinationPath, $getPath,$fileName);
                $photo1 = $fileName;
                $data['admin'] = $user->email;
                // return $getPath;

    
            }

        News::find($id)->update($data);
        return redirect()->route('news.index')
            ->with('success','New news has been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route('news.index')
                        ->with('success','News has been deleted successfully');
    }
}