<?php

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new JackValidator($translator, $data, $rules, $messages);
});

?>