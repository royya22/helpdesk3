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
        if ($this->status == 1) {
            $status = "Open";
        }elseif ($this->status == 2) {
            $status = "Pending";
        }elseif ($this->status == 3) {
            $status = "Close";
        }

        $teknisi = unserialize($this->teknisi);
        if ($teknisi == null) {$teknisi = "";}
        
        return [
            'id' => $this->id_laporan,
            'kode_permohonan' => $this->kode_permohonan,
            'nama_pemohon' => $this->nama_pemohon,
            'no_tlp' => $this->no_tlp,
            'unit' => $this->k_unit->nama_unit,
            'ruangan' => $this->ruangan,
            'subjek' => $this->k_subjek->subjek,
            'deskripsi' => $this->deskripsi,
            'status' => $status,
            'keterangan_pending' => $this->keterangan_pending,
            'keterangan_close' => $this->keterangan_close,
            'teknisi' => $teknisi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
