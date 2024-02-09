<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMC extends Model
{
    use HasFactory;
    protected $table = 'amc';

    static public function get_record($request)
    {
        $return = self::select('amc.*')
            ->orderBy('id', 'desc')
            ->where('is_delete', '=', 0);

        $return = $return->paginate(20);

        return $return;
    }
}
