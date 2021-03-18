<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIssueList extends Model
{
    use HasFactory;
    protected $fillable = [
    	'issue_id','product_id','model_no','serial_no','price','qty','amount','status'];

	 public function product()
	{
	    return $this->hasOne('App\Models\Product', 'id', 'product_id');
	}
}
