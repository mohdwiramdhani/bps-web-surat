<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Keluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'nomor_agenda',
        'tujuan',
        'tanggal_surat',
        'isi_ringkasan',
        'keterangan',
        'lampiran',
        'kode_klasifikasi',
        'sifat_surat',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedTanggalSuratAttribute(): string {
        return Carbon::parse($this->tanggal_surat)->isoFormat('dddd, D MMMM YYYY');
    }

    public function getFormattedCreatedAtAttribute(): string {
        return Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
    }

    public function getFormattedUpdatedAtAttribute(): string {
        return Carbon::parse($this->updated_at)->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
    }
}
