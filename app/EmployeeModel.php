<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
  protected $fillable = [
      'emp_fname',
      'emp_lname',
      'emp_image',
      'emp_job',
      'emp_status',
      'user_id',
      'map_title',
      'lat',
      'lng',

      ];

      public function user()
    {
      return $this->belongTo(User::class);
    }
}
