<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class Module extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = ['name'];
}
