<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BotStep extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bots_steps';

    public function rules()
    {
        $timeRule = BotStepRule::where('id_bot_step', $this->id)
            ->where('rule', 'time')
            ->first();

        if (is_object($timeRule)) {
            $rules = [
                'type' => 'time',
                'source' => $timeRule
            ];

            return $rules;
        }

        $textRule = BotStepRule::where('id_bot_step', $this->id)
            ->where('rule', 'text')
            ->first();

        if (is_object($textRule)) {
            $rules = [
                'type' => 'text',
                'source' => $textRule
            ];

            return $rules;
        }

        $equalRules = BotStepRule::where('id_bot_step', $this->id)
            ->where('rule', 'equal')
            ->get();

        if ($equalRules->count() > 0) {
            $rules = [
                'type' => 'equal',
                'source' => $equalRules
            ];

            return $rules;
        }

        return null;
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
