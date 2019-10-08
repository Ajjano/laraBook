<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Topic extends Model
{
//    protected $primaryKey='id';
//    protected $table='topics'; //в нашем случае это не указывается
    protected $fillable=['name' ];

    public static function add($fields){
        $topic=new Topic();//new self //new static;
        $topic->fill($fields);
        //$topic->fill([$name, $...]);
        $topic->save();
        return $topic;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        Storage::delete('uploads/'.$this->image_path);
        $this->delete();

    }


}
