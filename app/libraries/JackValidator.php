<?php

class JackValidator extends Illuminate\Validation\Validator {

    public function validateIsUnique($attribute, $value, $parameters)
    {
        return 0 == count(DB::table($parameters[0])
			->whereRaw("LOWER(".$parameters[1].") = ?", array(strtolower($value)))
			->get());
    }
}