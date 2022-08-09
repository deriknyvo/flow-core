<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function currentStep()
    {
        return $this->hasOne(BotStep::class, 'id', 'current_step_id');
    }

    public function processe()
    {
        // 
    }
}
