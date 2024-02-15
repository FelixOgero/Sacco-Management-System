<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoanModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'loan';

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
        'password' => 'hashed',
    ];

    static function getAllRecord() {
      return self::get();  
    }

    static public function getSingle($id) {
        return self::find($id);
    }

    public function getUserName() {
        return $this->belongsTo(LoanUserModel::class, 'user_id');
    }

    public function getStaffName() {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function getLoanType() {
        return $this->belongsTo(LoanTypesModel::class, 'loan_types_id');
    }

    public function getLoanPlan() {
        return $this->belongsTo(LoanPlanModel::class, 'loan_plan_id');
    }
   
}
