<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

/**
 * Class EnumerableTrait is used to get the possible values on a ENUM column.
 *
 * @package App\Traits
 */
trait EnumerableTrait
{

    /**
     * @param      $column
     * @param null $table
     *
     * @return array
     */
    public static function getEnumValues($column, $table = null)
    {
        $table = $table ?: (new static)->getTable();

        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'"))[0]->Type;
        preg_match_all("/'([\w ]*)'/", $type, $values);

        return $values[1];
    }
}