<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class Lesson extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['name', 'description', 'video'];

    public function suports()
    {
        return $this->hasMany(Support::class);
    }
    
    public function views()
    {
        return $this->hasMany(View::class)
                    ->where(function($query) {
                        if(auth()->check()){
                            return $query->where('', auth()->user()->id);
                        }
                    });
    }
}
