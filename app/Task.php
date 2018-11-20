<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = ['task_name','user_id'];
    protected $dates = ['created_at','updated_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
