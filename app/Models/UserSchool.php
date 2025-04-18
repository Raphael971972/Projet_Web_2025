<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSchool extends Model
{
    protected $table        = 'users_schools';
    protected $fillable     = ['user_id', 'school_id', 'role', 'active'];

    /**
     * Count the number of teachers in the users_schools table.
     *
     * @return int
     */
    public static function countTeachers()
    {
        return self::where('role', 'teacher')->count();
    }

}
