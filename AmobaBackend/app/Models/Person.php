<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class Person extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persons';
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'ima_profile',
        'document',
        'type_person'
    ];

    public function ScopeZero($query)
    {
        return $query->where('type_person', '0');
    }

    public function ScopeOne($query)
    {
        return $query->where('type_person', '1');
    }

    public function ScopeFiltro($query, $request)
    {
        return $query->when($request->first_name, function ($query2, $first) {
            return $query2->where(DB::raw('upper(first_name)'), 'like', DB::raw("upper(\"%$first%\")"));
        })
            ->when($request->last_name, function ($query2, $last) {
                return $query2->Where(DB::raw('upper(last_name)'), 'like', DB::raw("upper(\"%$last%\")"));
            })
            ->when($request->type_person === '0', function ($query2) {
                    return $query2->where('type_person', '0');
            })
            ->when($request->type_person === '1', function ($query2) {
                return $query2->where('type_person', '1');
        });
    }
}
