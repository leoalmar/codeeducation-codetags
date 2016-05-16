<?php
/**
 * Created by PhpStorm.
 * User: imac
 * Date: 5/16/16
 * Time: 17:33
 */

namespace Leoalmar\CodeTags\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = "leoalmar_tags";

    protected $fillable = [
        'name',
        'taggable_id',
        'taggable_type'
    ];

    public function taggable()
    {
        return $this->morphTo();
    }

}