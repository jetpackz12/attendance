<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAuthorizedPageNamesAttribute()
    {
        $authorizedPages = [
            1 => 'Dashboard',
            2 => 'DTR Management',
            3 => 'Teacher Management',
            4 => 'Pupil Management',
            5 => 'Manage Users',
            6 => 'Reports',
        ];

        return collect(explode(',', $this->authorized_page))
            ->map(function ($page) use ($authorizedPages) {
                return $authorizedPages[trim($page)] ?? 'Unknown';
            })
            ->toArray();
    }

}
