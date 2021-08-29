<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $table ='posts';
   

    protected $table='posts';
    protected $primarykey='id';
    protected $fillable=['title','founded','description','image','user_id','status'];
    protected $hidden=['id'];
    protected $visible=['title','founded'];

    public function postmodels()
    {
        return $this->hasMany(PostModel::class);

    }
    //Define a has many through relationships
    public function engines()
    {

        return $this->hasManyThrough(
            Engine::class,
            PostModel::class,
            'post_id',//foreign key on postmodel table
            'model_id' //foreign key on engine table
        );

    }

    //define a has one through relationship
    public function productionDate(){

        return $this->hasOneThrough(

            PostProductionDate::class,
            PostModel::class,
            'post_id',
            'model_id'

        );
    }
    public function products(){


       return $this->belongsToMany(Product::class);
        
    }
 
}
