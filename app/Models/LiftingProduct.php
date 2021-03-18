<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiftingProduct extends Model
{
    use HasFactory;
    protected $fillable = [
    	'lifting_id','vendor_id','product_id','product_name','model_no','serial_no','qty','price','mrp', 'status'];
}
