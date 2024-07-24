<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dates = ['tanggal'];
    
    /**
     * Get the user that owns the Administrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Pasien(): BelongsTo
    {
        return $this->belongsTo('App\Models\Pasien')->withDefault();
    }

    /**
     * Get the user that owns the Administrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Dokter(): BelongsTo
    {
        return $this->belongsTo('App\Models\Dokter')->withDefault();
    }
            
}
