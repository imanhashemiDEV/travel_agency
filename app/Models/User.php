<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password','mobile','national_code','is_active','is_admin','avatar'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable ,HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mobile_verified_at' => 'datetime',
            'is_active' => 'boolean',
            'is_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }

    
    public function isSuperAdmin()
    {
        $user = auth()->user();
        return $user->id == 1 || $user->is_admin || $user->hasRole('مدیر کل');
    }

    public function isAdmin()
    {
        $user = auth()->user();
        return $user->is_admin;
    }

    public function isUserAdmin()
    {
        $user = auth()->user();
        return $user->isSuperAdmin() || $user->hasRole('مدیر کاربران');
    }

    // ===================== Relations =====================

//    public function bookings(): HasMany
//    {
//        return $this->hasMany(Booking::class);
//    }
//
//    public function payments(): HasMany
//    {
//        return $this->hasMany(Payment::class);
//    }
//
//    public function reviews(): HasMany
//    {
//        return $this->hasMany(Review::class);
//    }
//
//    public function couponUsages(): HasMany
//    {
//        return $this->hasMany(CouponUsage::class);
//    }

    // ===================== Scopes =====================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


    // ===================== Helpers =====================


}
