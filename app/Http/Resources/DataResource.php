<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'umur' => Carbon::parse($this->tgl_lahir)->diffInYears(Carbon::parse(now())),
            'tgl_lahir' => $this->tgl_lahir->isoFormat('D MMMM Y'),
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'negara' => $this->negara,
        ];
    }
}
