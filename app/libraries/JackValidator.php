<?php

class JackValidator extends Illuminate\Validation\Validator {

    public function validateIsUnique($attribute, $value, $parameters)
    {
        return 0 == count(DB::table($parameters[0])->whereRaw("LOWER(".$parameters[1].") = ?", array(strtolower($value)))->get());
    }
    
    public function validateIncorrectLogin($attribute, $value, $parameters)
    {
        return 1 == count(DB::table('users')
			->whereRaw("LOWER(name) = ?", array(strtolower($parameters[0])))
			->where('password', $parameters[1])
			->get());
    }

}