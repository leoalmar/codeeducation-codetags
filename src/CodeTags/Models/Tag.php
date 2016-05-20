<?php

namespace Leoalmar\CodeTags\Models;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = "leoalmar_tags";

    protected $fillable = [
        'name',
        'taggable_id',
        'taggable_type'
    ];

    private $validator;

    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }

    public function isValid()
    {
        $validator = $this->validator;

        $validator->setRules(['name'=>'required|max:255']);
        $validator->setData( $this->attributes );

        if($validator->fails()){
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }


    public function taggable()
    {
        return $this->morphTo();
    }

}