<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{


    protected $guarded = array();
    protected $table ="mytable";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable=['id', 'Parent_Product_Title', 'Product_Image', 'amazon_url','Weight_in_KGs','Export_Weight_inKGs'];

    //iptal
    public function pictures()
    {
        return $this->hasMany('App\Model\ProductPictures',  'id');
    }


    public function user()
    {
        return $this->hasOne('App\User','id','post_author');
    }

}
