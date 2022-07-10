<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'location', 'user_id', 'image'];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('location', 'like', '%' . request('search') . '%');
                //->orWhere('user->name', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
