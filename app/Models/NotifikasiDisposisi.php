<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotifikasiDisposisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disposisi(): BelongsTo
    {
        return $this->belongsTo(Disposisi::class, 'disposisi_id', 'id');
    }

    public function masuk(): BelongsTo
    {
        return $this->belongsTo(Masuk::class, 'surat_id', 'id');
    }
}
