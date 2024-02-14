<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmcFreeService extends Model
{
    use HasFactory;
    protected $table = 'amc_free_service';

    static public function get_free_service($id)
    {
        $return = self::select('amc_free_service.*')
            ->where('amc_id', '=', $id)
            ->orderBy('id', 'asc');

        $return = $return->paginate(20);
        return $return;
    }
}
