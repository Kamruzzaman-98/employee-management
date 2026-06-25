<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'salary',
        'image',
        'department_id'
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
