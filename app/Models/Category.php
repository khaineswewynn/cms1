<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','parent_id'];
    protected $dates=['deleted_at'];

    public function parent()
    {
        return $this->belongsTo($this,'parent_id');
    }
}
