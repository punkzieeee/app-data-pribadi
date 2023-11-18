<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
            $res = $request->validate([
                'nik' => 'required',
                'nama_lengkap'=>'required'
            ]);

            $response = Http::withBody(json_encode($res), "application/json")->get('http://127.0.0.1:8080/api/v1/search')['data'];
            return view('sections.result', compact('response'))->with(['success' => 'Pencarian data berhasil!']);
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

            $response = Http::withBody(json_encode($res), "application/json")->post('http://127.0.0.1:8080/api/v1/save');
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil disimpan!']);
            } else {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
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

            $response = Http::withBody(json_encode($res), "application/json")->put('http://127.0.0.1:8080/api/v1/edit?uuid='.$request->uuid);
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil diubah!']);
            } else {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }

    public function destroy(Request $request) {
        try {
            $res = $request->validate([
                'nik' => 'required',
            ]);

            $response = Http::withBody(json_encode($res), "application/json")->delete('http://127.0.0.1:8080/api/v1/delete');
            if ($response->successful()) {
                return redirect()->route('data.index')->with(['success' => 'Data berhasil dihapus!']);
            } else {
                return redirect()->route('data.index')->with(['error' => 'Terjadi kesalahan!']);
            }
        } catch (\Throwable $th) {
            return $this->Response($th->getMessage(), null, $th->getCode());
        }
    }
}
