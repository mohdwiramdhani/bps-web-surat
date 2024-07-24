<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'penerima',
        'isi_disposisi',
        'tenggat_waktu',
        'catatan',
        'surat_id',
        'token',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function masuk(): BelongsTo
    {
        return $this->belongsTo(Masuk::class, 'surat_id', 'id');
    }

    public function notifikasiDisposisi()
    {
        return $this->hasOne(NotifikasiDisposisi::class, 'disposisi_id');
    }

    public function getFormattedTenggatWaktuAttribute(): string {
        return Carbon::parse($this->tenggat_waktu)->isoFormat('dddd, D MMMM YYYY');
    }


}
