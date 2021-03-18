<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifting extends Model
{
    use HasFactory;
    protected $fillable = [
    	'serial_no','vaouchar_no','vendor_id','purchase_by','submission_date','vouchar_date','total_qty','total_price','total_mrp_price'];

    public function vendor()
	{
		return $this->hasOne('App\Models\Vendor', 'id', 'vendor_id');
	}
}
