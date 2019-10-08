<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable=['name'];

    public static function add($fields){
        $block=new Topic();//new self //new static;
        $block->fill($fields);
        //$block->fill([$name, $...]);
        $block->save();
        return $block;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        $this->delete();

    }

    public function uploadImage($image){
        if($image==null)
            return;
        else {
            Storage::delete('uploads/'.$this->image_path);
            $image_name = str_random(10) . '.' . $image->extension();
            $image->storeAs('uploads', $image_name);
            $this->image_path=$image_name;
            $this->save();
        }
    }


    public function getImage(){
        if($this->image_path==null){
            return '/uploads/no-image.png'; //заглушка на случай если в базе пусто
        }else
            return'/uploads/'.$this->image_path;
    }
}