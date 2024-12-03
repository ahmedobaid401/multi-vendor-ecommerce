<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $casts=[
        "options"=>"json"
    ];
    protected $guarded = []; // This will allow all fields for mass assignment.
    
    public function enable(){
        return $this->update(["status"=>"active"]);
    }

    public function disable(){
        return $this->update(["status"=>"inactive"]);
    }
     
    // to knowing if the paymentMethod active or not
    public function getEnabledAttribute(){
        return $this->status ==="active";// this return true or false to 
    }
}
