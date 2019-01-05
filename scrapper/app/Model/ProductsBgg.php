<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsBgg extends Model
{


    protected $guarded = array();
    protected $table ="mytable";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable=['id', 'Parent_Product_Title', 'boardgamegeek_url', 'Product_Description','Manufacturers',
    'Categories','Tag_Group_1_Players_','Tag_Group_2_Age','Tag_Group_3_Playing_Time','Tag_Group_4_Game_Mechanic',
        'Tag_Group_5_Type','Tag_Group6_Game_Category','Tag_Group_7_Colour','Tag_Group_8_System'];



    public function user()
    {
        return $this->hasOne('App\User','id','post_author');
    }

}
