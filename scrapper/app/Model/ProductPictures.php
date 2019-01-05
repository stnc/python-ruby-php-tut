<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPictures extends Model
{
    protected $guarded = array();
    protected $table= 'urun_resimler';
    public $timestamps = false;
    public function products()
    {
        return $this->belongsToMany('App\Model\Products')
            ->withTimestamps();
    }
}
