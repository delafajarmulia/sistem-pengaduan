<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpotController extends Controller
{
    // lihat semua wisata
    public function index()
    {
        $spots = Spot::all();
        return view('spots', compact('spots'));
    }

    // lihat detail wisata
    public function spotDetail($id)
    {
        $spot = Spot::findOrFail($id);
        return view('spot-detail', compact('spot'));
    }

    // tambah wisata
    public function spotForm()
    {
        return view('spot-add');
    }

    // logic tambah wisata
    public function createSpot(Request $request)
    {
        $request->validate(
            [
                'name'          => 'required|min:3',
                'image'         => 'required|image|mimes:jpeg,jpg,png,bmp,gif,webp|max:2048',
                'address'       => 'required|min:3',
                'html_address'  => 'required|min:3',
                'description'   => 'required|min:3',
            ],
            [
                'name'=>[
                    'required'  =>'Data nama wisata harus diisikian',
                    'min'       =>'Nama minimal diisikan oleh :min karakter'
                ],
                'image'=>[
                    'image'     => 'data yang ditambahkan harus berupa gambar',
                    'mimes'     => 'eksetensi gambar hanya boleh :mimes',
                    'max'       => 'gambar tidak boleh lebih dari 2 MB'
                ],
                'address'=>[
                    'required'  =>'Data alamat wisata harus diisikian',
                    'min'       =>'Alamat minimal diisikan oleh :min karakter'
                ],
                'html_address'=>[
                    'required'  =>'Data alamat (maps) wisata harus diisikian',
                    'min'       =>'Alamat (maps) minimal diisikan oleh :min karakter'
                ],
                'description'=>[
                    'required'  =>'Data deskripsi wisata harus diisikian',
                    'min'       =>'Deskripsi minimal diisikan oleh :min karakter'
                ],
            ]
        );
        
        $image = $request->file('image');
        $newFileName = time(). '-' .$image->getClientOriginalName() ; 
        $image->move(public_path('spots'), $newFileName);

        $data = [
            'name'          => $request->input('name'),
            'image'         => $newFileName,
            'address'       => $request->input('address'),
            'html_address'  => $request->input('html_address'),
            'description'   => $request->input('description'),
        ];

        Spot::create($data);

        return redirect()->route('spots')->with('success', 'Berhasil menambahkan data');
    }

    // edit wisata
    public function spotDetailForEdit($id)
    {
        $spot = Spot::find($id);
        
        if(!$spot){
            return view('spot-edit')->with('error', 'Data wisata tidak ditemukan');
        }

        return view('spot-edit', compact('spot'));
    }

    // logic update wisata
    public function spotUpdate(Request $request, $id)
    {
        $spot = Spot::find($id);

        if(!$spot){
            return redirect()->back()->with('error', 'data not found');
        }

        $request->validate(
            [
                'name'          => 'required|min:3',
                'address'       => 'required|min:3',
                'html_address'  => 'required|min:3',
                'description'   => 'required|min:3',
            ],
            [
                'name'=>[
                    'required'  =>'Data nama wisata harus diisikian',
                    'min'       =>'Nama minimal diisikan oleh :min karakter'
                ],
                'address'=>[
                    'required'  =>'Data alamat wisata harus diisikian',
                    'min'       =>'Alamat minimal diisikan oleh :min karakter'
                ],
                'html_address'=>[
                    'required'  =>'Data alamat (maps) wisata harus diisikian',
                    'min'       =>'Alamat (maps) minimal diisikan oleh :min karakter'
                ],
                'description'=>[
                    'required'  =>'Data deskripsi wisata harus diisikian',
                    'min'       =>'Deskripsi minimal diisikan oleh :min karakter'
                ],
            ]
        );
        
        
        $spot->name = $request->name;
        $spot->address = $request->address;
        $spot->html_address = $request->html_address;
        $spot->description = $request->description;

        if($request->hasFile('image')){
            $request->validate(
                [
                    'image'         => 'required|image|mimes:jpeg,jpg,png,bmp,gif,webp|max:2048',
                ],
                [
                    'image'     => 'data yang ditambahkan harus berupa gambar',
                    'mimes'     => 'eksetensi gambar hanya boleh :mimes',
                    'max'       => 'gambar tidak boleh lebih dari 2 MB'
                ]
            );

            // hapus file lama
            if($spot->image){
                Storage::delete('public/spots/'.$spot->image);
            }

            // simpan file baru
            $image = $request->file('image');
            $newFileName = time(). '-' .$image->getClientOriginalName() ; 
            $image->move(public_path('spots'), $newFileName);

            $spot->image = $newFileName;
        } else {
            $spot->image = $request->old_image;
        }

        $spot->save();

        return redirect()->route('spots')->with('success', 'Berhasil menambahkan data');
    }
}
