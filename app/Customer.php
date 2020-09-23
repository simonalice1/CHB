<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $country
*/
class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'address', 'phone', 'email'];


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
}
