<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    static public function get_record($request)
    {
        $return = self::select('category.*')
            ->orderBy('category.id', 'desc')
            ->where('is_delete', '=', 0);

        $return = $return->paginate(20);

        return $return;
    }

    static public function get_single($id)
    {
        return self::find($id);
    }
}
