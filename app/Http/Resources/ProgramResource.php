<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id_laporan,
            'kode_permohonan' => $this->kode_permohonan,
            'nama_pemohon' => $this->nama_pemohon,
            'no_tlp','unit' => $this->no_tlp,
            'ruangan' => $this->ruangan,
            'subjek' => $this->subjek,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
            'keterangan_pending' => $this->keterangan_pending,
            'keterangan_close' => $this->keterangan_close,
            'teknisi' => $this->teknisi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
