<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Admin;
use App\Homestay;

class HomestayController extends Controller
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
        $homestays = Homestay::latest()->paginate(5);
        return view('homestays.index',compact('homestays'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homestays.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request -> all());

        request()->validate([
        // $rules = [
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'required|image|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
        // ];
        ]);

        // $messages = [
        //     'required' => 'Field harus di isi alias tidak boleh kosong',
        //     'image' => 'Data harus berbentuk gambar',
        //     'mimes' => 'Image harus berekstensi JPEG, JPG, dan PNG',
        // ];

        $data = $request->only('nama_homestay', 'harga', 'kuota', 'lang', 'long', 'foto_1', 'foto_2', 'foto_3');
        
        // $data = $request->except(['image']);
        $photo1 = "";        
        if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
            $ip = request()->ip();
            $file = $request->foto_1;
            $fileName = $file->getClientOriginalName();
            $getPath = 'http://192.168.43.85/homeislandadmin/public/img/' . $fileName;
            $destinationPath = "images/homestay";
            $data['foto_1'] = '../'. $destinationPath . '/' . $fileName;
            $file -> move($destinationPath, $getPath,$fileName);
            $photo1 = $fileName;
            // return $getPath;


        }

        $photo2 = "";        
        if ($request->hasFile('foto_2')){ //has file itu meminta nama databasenya bukan classnya
            // $data['image'] = $this->savePhoto($request->file('image'));

            $destinationPath = "images/homestay";
            $file = $request->foto_2;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111,9999).'.'.$extension;
            $file -> move($destinationPath, $fileName);
            $photo2 = $fileName;

        }

        $photo3 = "";        
        if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
            // $data['image'] = $this->savePhoto($request->file('image'));

            $destinationPath = "images/homestay";
            $file = $request->foto_3;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111,9999).'.'.$extension;
            $file -> move($destinationPath, $fileName);
            $photo3 = $fileName;

        }

        // if ($request->hasFile('image')) {
            
        //     $imageName1 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('/images/homestay'), $imageName1);

        //     $imageName2 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('/images/homestay'), $imageName2);

        //     $imageName3 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('/images/homestay'), $imageName3);
            
        // }

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if($validator->fails()) {
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Oops, gagal menambahkan data homestay"]);
        //     return redirect() -> route('homestays.index')->withErrors($validator)->withInput();
        // }

        // $homestay = Homestay::create($data);
        // if($homestay){
        //     Session::flash('flash_notification', ["level"=>"success", "message"=>"Berhasil menambahkan homestay '".$request->title."' kedalam database"]);
        //     return redirect()->route('homestays.index');
        // }
        // else{
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Oops, gagal menambahkan data homestay"]);
        //     return redirect()->route('homestays.index')->withInput();  
        // }

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_1',$imageName1);

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_2',$imageName2);

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_3',$imageName3);

    //     if( $itemreq->hasFile('frontimage')){ 
    //         $image = $itemreq->file('frontimage'); 
    //         $fileName = $image->getClientOriginalName();
    //     $fileExtension = $image->getClientOriginalExtension();
    //         dd($fileExtension); 
    //     } else {
    //         dd('No image was found');
    // }

        Homestay::create($request->all());
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.show',compact('homestay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.edit',compact('homestay'));
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
        // dd($request -> all());
        request()->validate([            
        // $rules = [
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lang' => 'required',
            'long' => 'required',
            'foto_1' => 'bail|required|image|mimes:jpeg,png,jpg|max:15000',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:15000',
        // ];
            ]);

        // $messages = [
        //     'required' => 'Field harus di isi alias tidak boleh kosong',
        //     'image' => 'Data harus berbentuk gambar',
        //     'mimes' => 'Image harus berekstensi JPEG, JPG, dan PNG',
        // ];

        // $data = $request->except(['image']);
        // if ($request->hasFile('image')){
        //     $data['image'] = $this->savePhoto($request->file('image'));
        //     if($olddata->image !== '') $this->deletePhoto($olddata->image);
        // }

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if($validator->fails()) {
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Oops, gagal mengubah data homestay"]);
        //     return redirect() -> route('homestays.index')->withErrors($validator)->withInput();
        // }

        $olddata = Homestay::find($id);
        $data = $request->except(['image']);
        $photo1 = "";        
        if ($request->hasFile('foto_1')){ //has file itu meminta nama databasenya bukan classnya
            // $data['image'] = $this->savePhoto($request->file('image'));

            $destinationPath = "images/homestay";
            $file = $request->foto_1;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111,9999).'.'.$extension;
            $file -> move($destinationPath, $fileName);
            $photo1 = $fileName;

            if($olddata->image !== '') $this->deletePhoto($olddata->image);
        }

        $photo2 = "";        
        if ($request->hasFile('foto_2')){ //has file itu meminta nama databasenya bukan classnya
            // $data['image'] = $this->savePhoto($request->file('image'));

            $destinationPath = "images/homestay";
            $file = $request->foto_2;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111,9999).'.'.$extension;
            $file -> move($destinationPath, $fileName);
            $photo2 = $fileName;

            if($olddata->image !== '') $this->deletePhoto($olddata->image);
        }

        $photo3 = "";        
        if ($request->hasFile('foto_3')){ //has file itu meminta nama databasenya bukan classnya
            // $data['image'] = $this->savePhoto($request->file('image'));

            $destinationPath = "images/homestay";
            $file = $request->foto_3;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(1111,9999).'.'.$extension;
            $file -> move($destinationPath, $fileName);
            $photo3 = $fileName;

            if($olddata->image !== '') $this->deletePhoto($olddata->image);
        }

        // Cek Kondisi berdasarkan latitude dan longtitude, sudah ada atau belum, dengan asumsi dalam satu kordinat
        // hanya ada satu homestay

        // $homestay = Homestay::find($id);
        // if($homestay->lat != $request->lat and $homestay->long != $request->long){
        //     $check_homestay = Homestay::where('lat', $request->lat)->where('long', $request->long)->count();
        // }
        // else{
        //     $check_homestay = 0;
        // }
 
        // if($check_homestay) {
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Homestay dengan Alamat yang sama sudah ada"]);
        //     return redirect()->route('homestays.index')->withInput();        
        // }

        // $homestay = Homestay::update($data);
        // if($homestay){
        //     Session::flash('flash_notification', ["level"=>"success", "message"=>"Berhasil mengubah data homestay '".$request->title."' kedalam database"]);
        //     return redirect()->route('homestays.index');
        // }
        // else{
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Oops, gagal mengubah data homestay"]);
        //     return redirect()->route('homestays.index')->withInput();  
        // }

        // if ($request->hasFile('image')) {
            

        //     $imageName1 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('images'), $imageName1);

        //     $imageName2 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move('/images', $imageName2);

        //     $imageName3 = time().'.'.request()->image->getClientOriginalExtension();
        //     request()->image->move(public_path('images'), $imageName3);
        // }

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_1',$imageName1);

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_2',$imageName2);

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('foto_3',$imageName3);   

        Homestay::find($id)->update($request->all());
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $data = Homestay::find($id);
        // $homestay = Homestay::find($id)->delete();
        // if($homestay){
        //     if($data->image !== '') $this->deletePhoto($data->image);
        //     Session::flash('flash_notification', ["level"=>"success", "message"=>"Berhasil menghapus Homestay '".$data->title."'"]);
        //     return redirect()->route('homestays.index');
        // }
        // else {
        //     Session::flash('flash_notification', ["level"=>"danger", "message"=>"Oops, gagal menghapus homestay"]);
        //     return redirect() -> route('homestays.index')->withErrors($validator)->withInput();  
        // }

        Homestay::find($id)->delete();
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been deleted successfully');
    }

    // public function savePhoto(UploadedFile $photo) {
    //     // dd($request -> all());


    //     $fileName = str_random(40) . '.' . $photo->guessClientExtension();

    //     // $fileName = $photo->getClientOriginalName();
    //     $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/homestay';
    //     $photo -> move($destinationPath, $fileName);
    //     // move_uploaded_file($photo['file']['tmp_name'], $destinationPath);
    //     return $fileName;
    
    // }
 
    public function deletePhoto($filename){
        $path = public_path() . DIRECTORY_SEPARATOR . 'images/homestay'.$filename;
        return File::delete($path);
    }

    public function getUserImage($id)
    {
        $file = Storage::disk('public')->get($id);
    
        return view('yourviewnamehere', ['myFile' => $file]);
    }
}
