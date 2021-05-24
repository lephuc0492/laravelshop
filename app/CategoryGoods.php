<?php

namespace App;
Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;

class CategoryGoods extends Model
{
    protected $table = "CategoryGoods";
    public $timestamps = false;

}
