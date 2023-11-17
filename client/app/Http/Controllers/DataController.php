<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataController extends Controller
{
    public function index() {
        try {
            $res = Data::all();
            $collection = DataResource::collection($res);
            return $this->Response('OK', $collection, 200);
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function show(Request $request)
    {
        try {
            $res = $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required'
            ]);

            // $res = Data::where('nik', $request->nik)->orWhere('nama_lengkap', $request->nama_lengkap)->get();
            // $collection = DataResource::collection($res);

            // if ($res === null || $res === []) {
            //     return $this->Response("Data tidak ditemukan.", $res, 404);
            // } else {
            //     return $this->Response("OK", $collection, 200);
            // }
            return Redirect::to('http://127.0.0.1:8080/api/v1/search')->withInput($res);
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function store(Request $request) {
        try {
            $res = $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            // Data::create($res);

            // return $this->Response("OK", $res, 200);
            return Redirect::to('http://127.0.0.1:8080/api/v1/save')->route('data.store')->withInput($res);
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function update(Request $request) {
        try {
            $res = $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            // $res = Data::where('nik', $request->nik);

            // $res->update([
            //     'nik' => $request->nik,
            //     'nama_lengkap' => $request->nama_lengkap,
            //     'jenis_kelamin' => $request->jenis_kelamin,
            //     'tgl_lahir' => $request->tgl_lahir,
            //     'alamat' => $request->alamat,
            //     'negara' => $request->negara,
            // ]);

            // return $this->Response("OK", $res, 200);
            return Redirect::to('http://127.0.0.1:8080/api/v1/edit')->route('data.update')->withInput($res);
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function destroy(Request $request) {
        try {
            $res = $request->validate([
                'nik' => 'required|numeric',
            ]);

            // $res = Data::where('nik', $request->nik);

            // if ($res === null || $res === []) {
            //     return $this->Response("Data tidak ditemukan.", $res, 404);
            // } else {
            //     $res->delete();
            //     return $this->Response("OK", $res, 200);
            // }
            return Redirect::to('http://127.0.0.1:8080/api/v1/delete')->route('data.destroy')->withInput($res);
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }
}
