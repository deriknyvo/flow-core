<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotStep extends Model
{
    use HasFactory;

    protected $table = 'bots_steps';

    public function rules()
    {
        return $this->hasMany(BotStepRule::class, 'id_bot_step', 'id');
    }

    public function messages()
    {
        return $this->hasMany(BotStepMessage::class, 'id_bot_step', 'id');
    }

    public function exception()
    {
        return $this->hasOne(BotStepException::class, 'id_bot_step', 'id');
    }
}
