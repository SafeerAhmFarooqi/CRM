<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\AdminMustApprove;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, AdminMustApprove, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'shopname',
        'email',
        'password',
        'subdomain',
        'status',
        'profile_pic',
        'phone',
        'company',
        'taxnumber',
        'fax',
        'postalcode',
        'address',
        'companysite',
        'logo',
        'colorsetting',
        'country_id',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(SliderImages::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id');
    }

    public function getCountryName($id)
    {
            return (Country::findOrFail($id))->country;
    }

    public function valueAddTax()
    {
        return $this->hasOne(ValueAddTax::class, 'user_id');
    }

    public function invoiceSetting($invoiceType)
    {
        return InvoiceSetting::where('user_id',Auth::user()->id)->where('invoicetype',$invoiceType)->first();
    }

    public static function getCrmSetting($modelName,$shopId)
    {
        $modelName = '\\App\\Models\\'.$modelName;
        $model=new $modelName; 
        $rows=$model::where('user_id',0)->where('status',true)->orWhere('user_id',$shopId)->where('revoke',NULL)->get();
        $revoke=$model::where('user_id',$shopId)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $rows=$rows->where('id','!=',$id);
            }
        }
        return $rows;
    }

    public function setColorSettingAttribute($value)
    {
        // $array=$this->colorsetting??array();
        // array_push($array,$value);
        // $this->attributes['revoke'] = json_encode($array);    
        $this->attributes['colorsetting'] =json_encode($value);
    }

    public function getColorSettingAttribute()
    {
        //$this->attributes['revoke']=$value;
        return json_decode($this->attributes['colorsetting']);
    }

    public function getStatusColor($status)
    {
        switch ($status) {
            case "Received":
              echo Auth::user()->colorsetting[0]??"#000000";
              break;
            case "Approved":
              echo Auth::user()->colorsetting[1];
              break;
            case "Edit":
              echo Auth::user()->colorsetting[2];
              break;
            case "Forward Onto":
              echo Auth::user()->colorsetting[3];
              break;
            case "Waiting":
              echo Auth::user()->colorsetting[4];
              break;
            case "Order Completed":
              echo Auth::user()->colorsetting[5];
              break;
            case "Invoice":
              echo Auth::user()->colorsetting[6];
              break;
            case "Ready to Return":
              echo Auth::user()->colorsetting[7];
              break;
            case "Collection/Shipment":
              echo Auth::user()->colorsetting[8];
              break;
            default:
              echo "#000000";
          }
    }
}
