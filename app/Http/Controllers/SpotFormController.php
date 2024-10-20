<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class SpotFormController extends Controller
{
    public function index()
    {
        return view('spotform');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'name'          => 'required|min:3',
                'image'         => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg+xml,webp|max:2048',
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

        $image = $request->file('image');
        $image->storeAs('public/spots/', $image->hashName());

        $data = [
            'name'          => $request->input('name'),
            'image'         => $image->hashName(),
            'address'       => $request->input('address'),
            'html_address'  => $request->input('html_address'),
            'description'   => $request->input('description'),
        ];

        Spot::create($data);

        return redirect()->route('spot')->with('success', 'Berhasil menambahkan data');
    }
}
