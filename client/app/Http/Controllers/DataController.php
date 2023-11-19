<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;
class DataController extends Controller
{
    public function index() {
        try {
            $response = Http::get('http://127.0.0.1:8080/api/v1/all')['data'];
            return view('sections.index', compact('response'));
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function show(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }

            $response = Http::withBody(json_encode($validator->validated()), "application/json")->get('http://127.0.0.1:8080/api/v1/search')['data'];
            return view('sections.result', compact('response'));
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }


    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'nik' => 'required|numeric|unique:data_diri',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }

            $response = Http::withBody(json_encode($validator->validated()), "application/json")->post('http://127.0.0.1:8080/api/v1/save');
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil disimpan!']);
            } else if ($response->failed()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function update(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'nik' => 'required|numeric',
                'nama_lengkap'=>'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'negara' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }

            $response = Http::withBody(json_encode($validator->validated()), "application/json")->put('http://127.0.0.1:8080/api/v1/edit?uuid='.$request->uuid);
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil diubah!']);
            } else if ($response->failed()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function destroy(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'nik' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }

            $response = Http::withBody(json_encode($validator->validated()), "application/json")->delete('http://127.0.0.1:8080/api/v1/delete');
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil dihapus!']);
            } else if ($response->failed()) {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }
}
