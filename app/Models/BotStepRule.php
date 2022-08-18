<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BotStepRule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bots_steps_rules';

    public function nextStep()
    {
        return $this->hasOne(BotStep::class, 'id', 'redirect_to_step_id');
    }
}
