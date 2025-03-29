<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ["name","address","dob"];

    public function getCredential(){
        return $this->hasOne(Credential::class);
    }
    public function getAccounts(){
        return $this->hasMany(Account::class);
    }

    public function getServices(){
        return $this->belongsToMany(Service::class,
                                    "customer_services",
                                     "customer_id",
                                     "service_id"
        );
    }
}
