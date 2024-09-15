<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'steps',
        'user_id',
    ];

    // Relacionamento com o usuário que criou a receita
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Adicionando um método para verificar se o usuário pode editar a receita
    public function canEdit($userId)
    {
        return $this->user_id === $userId;
    }
}
