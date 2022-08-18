<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory, SoftDeletes;

    private $messages = [];

    public function currentStep()
    {
        return $this->hasOne(BotStep::class, 'id', 'current_step_id');
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class, 'id_bot', 'id');
    }

    public function processe($textMessageToCompare)
    {
        $isFirstStep = ($this->bot->first_step === $this->current_step_id);
        $rulesToValidate = $this->currentStep->rules();
        
        if ($isFirstStep) {
            $this->messages = $this->currentStep->messages;
        }

        if ($rulesToValidate === null) {
            return $this->messages;
        }

        switch ($rulesToValidate['type']) {
            case 'time':
                $nextStep = $rulesToValidate->nextStep;
                $this->current_step_id = $nextStep->id;
                $this->save();

                if (count($this->messages) > 0) {
                    $this->messages[] = $nextStep->messages;
                } else {
                    $this->messages = $nextStep->messages;
                }

                $this->processe($textMessageToCompare);
                break;

            case 'text':
                $nextStep = $rulesToValidate->nextStep;
                $this->current_step_id = $nextStep->id;
                $this->save();

                if (!$isFirstStep) {
                    $isString = is_string($textMessageToCompare);

                    if ($isString) {
                        if (count($this->messages) > 0) {
                            $this->messages[] = $nextStep->messages;
                        } else {
                            $this->messages = $nextStep->messages;
                        }
                    } else {
                        // Excessão
                    }
                }

                break;
            
            case 'equal':
                if (!$isFirstStep) {
                    foreach ($rulesToValidate['source'] as $rule) {
                        if ($rule->value_to_compare === $textMessageToCompare) {
                            $nextStep = $rulesToValidate->nextStep;
                            $this->current_step_id = $nextStep->id;
                            $this->save();

                            if (count($this->messages) > 0) {
                                $this->messages[] = $nextStep->messages;
                            } else {
                                $this->messages = $nextStep->messages;
                            }
                        } else {
                            
                        }
                    }
                }

                break;

            default:
                # code...
                break;
        }

        return $this->messages;
    }
}
