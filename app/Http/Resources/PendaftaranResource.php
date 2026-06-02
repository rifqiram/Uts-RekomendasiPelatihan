<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'peserta' => new PesertaResource($this->whenLoaded('peserta')),
            'pelatihan' => new PelatihanResource($this->whenLoaded('pelatihan')),
            'tanggal_daftar' => $this->tanggal_daftar?->toDateString(),
            'status' => $this->status,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
