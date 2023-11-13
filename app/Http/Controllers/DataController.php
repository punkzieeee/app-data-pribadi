<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Dto\Responses;

class DataController extends Controller
{
    public function index() {
        $response = new Responses();
        try {
            $res = Data::all();
            return $response->Response('OK', $res, 200);
        } catch (\Throwable $th) {
            return $response->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function show(Request $request)
    {
        $response = new Responses();
        try {
            $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required'
            ]);

            $res = Data::where('nik', $request->nik)->orWhere('nama_lengkap', $request->nama_lengkap)->get();

            if ($res === null || $res === []) {
                return $response->Response("Data tidak ditemukan.", $res, 404);
            } else {
                return $response->Response("OK", $res, 200);
            }
        } catch (\Throwable $th) {
            return $response->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function store(Request $request) {
        $response = new Responses();
        try {
            $res = $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            Data::create($res);

            return $response->Response("OK", $res, 200);
        } catch (\Throwable $th) {
            return $response->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function update(Request $request) {
        $response = new Responses();
        try {
            $request->validate([
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            $res = Data::where('nik', $request->nik);

            $res->update([
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'negara' => $request->negara,
            ]);

            return $response->Response("OK", $res, 200);
        } catch (\Throwable $th) {
            return $response->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function destroy(Request $request) {
        $response = new Responses();
        try {
            $request->validate([
                'nik' => 'required|numeric',
            ]);

            $res = Data::where('nik', $request->nik);

            if ($res === null || $res === []) {
                return $response->Response("Data tidak ditemukan.", $res, 404);
            } else {
                $res->delete();
                return $response->Response("OK", $res, 200);
            }
        } catch (\Throwable $th) {
            return $response->Response($th->getMessage(), null, $th->getCode());
        }
    }
}
