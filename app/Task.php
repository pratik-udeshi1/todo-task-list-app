<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = 'task';

    public $fillable = ['task_name', 'category_id', 'is_completed'];

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category')->select(['id', 'name']);
    }
}
