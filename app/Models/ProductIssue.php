<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIssue extends Model
{
    use HasFactory;
    protected $fillable = [
    	'customer_id','issue_no','date','total_qty','total_amount','status'];

 public function customer()
{
    return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
}


}

