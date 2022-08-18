<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BotStepMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bots_steps_messages';
}
