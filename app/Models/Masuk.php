<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'nomor_agenda',
        'pengirim',
        'tujuan',
        'tanggal_surat',
        'tanggal_terima',
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

    /**
     * @return HasMany
     */
    public function disposisi(): HasMany
    {
        return $this->hasMany(Disposisi::class, 'surat_id', 'id');
    }

    public function jumlahDisposisi()
    {
        return $this->disposisi()->count();
    }

    public function getFormattedTanggalSuratAttribute(): string {
        return Carbon::parse($this->tanggal_surat)->isoFormat('dddd, D MMMM YYYY');
    }

    public function getFormattedTanggalTerimaAttribute(): string {
        return Carbon::parse($this->tanggal_terima)->isoFormat('dddd, D MMMM YYYY');
    }

    public function getFormattedCreatedAtAttribute(): string {
        return Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
    }

    public function getFormattedUpdatedAtAttribute(): string {
        return Carbon::parse($this->updated_at)->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $find) {
            return $query
                ->where('nomor_agenda', $find)
                ->orWhere('nomor_surat', 'LIKE', $find . '%')
                ->orWhere('isi_ringkasan', 'LIKE', $find . '%')
                ->orWhere('pengirim', 'LIKE', $find . '%')
                ->orWhere('keterangan', 'LIKE', $find . '%');
        });
    }

}
