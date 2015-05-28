<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"             => ":attribute må være akseptert",
    "active_url"           => ":attribute er ikke en gyldig URL",
    "after"                => ":attribute må være en dato etter :date.",
    "alpha"                => ":attribute kan bare inneholde bokstaver",
    "alpha_dash"           => ":attribute kan bare inneholde bokstaver, nummer og bindestreker.",
    "alpha_num"            => ":attribute kan bare inneholde bokstaver og nummer.",
    "array"                => ":attribute må være en rekke.",
    "before"               => ":attribute må være en dato før:date.",
    "between"              => [
        "numeric" => ":attribute må være mellom :min og :max.",
        "file"    => ":attribute må være mellom :min og :max kilobytes.",
        "string"  => ":attribute må være mellom :min og :max karakter.",
        "array"   => ":attribute må være mellom :min og :max objekter.",
    ],
    "boolean"              => "The :attribute field must be true or false.",
    "confirmed"            => "The :attribute confirmation does not match.",
    "date"                 => ":attribute er ikke en gyldig dato.",
    "date_format"          => "The :attribute does not match the format :format.",
    "different"            => "The :attribute and :other must be different.",
    "digits"               => "The :attribute must be :digits digits.",
    "digits_between"       => "The :attribute must be between :min and :max digits.",
    "email"                => ":attribute må være en gyldig epost adresse.",
    "filled"               => ":attribute feltet er obligatoriskt.",
    "exists"               => "The selected :attribute is invalid.",
    "image"                => "The :attribute must be an image.",
    "in"                   => "The selected :attribute is invalid.",
    "integer"              => ":attribute må være et tall",
    "ip"                   => "The :attribute must be a valid IP address.",
    "max"                  => [
        "numeric" => ":attribute kan ikke være større enn :max.",
        "file"    => "The :attribute may not be greater than :max kilobytes.",
        "string"  => "The :attribute may not be greater than :max characters.",
        "array"   => "The :attribute may not have more than :max items.",
    ],
    "mimes"                => "The :attribute must be a file of type: :values.",
    "min"                  => [
        "numeric" => "Kilometer kan ikke ha negativ verdi.",
        "file"    => "The :attribute must be at least :min kilobytes.",
        "string"  => "The :attribute must be at least :min characters.",
        "array"   => "The :attribute must have at least :min items.",
    ],
    "not_in"               => "The selected :attribute is invalid.",
    "numeric"              => ":attribute må være et tall.",
    "regex"                => "The :attribute format is invalid.",
    "required"             => ":attribute feltet er påkrevd",
    "required_if"          => "The :attribute field is required when :other is :value.",
    "required_with"        => "The :attribute field is required when :values is present.",
    "required_with_all"    => "The :attribute field is required when :values is present.",
    "required_without"     => "The :attribute field is required when :values is not present.",
    "required_without_all" => "The :attribute field is required when none of :values are present.",
    "same"                 => "The :attribute and :other must match.",
    "size"                 => [
        "numeric" => "The :attribute must be :size.",
        "file"    => "The :attribute must be :size kilobytes.",
        "string"  => "The :attribute must be :size characters.",
        "array"   => "The :attribute must contain :size items.",
    ],
    "unique"               => ":attribute er allerede registrert.",
    "url"                  => "The :attribute format is invalid.",
    "timezone"             => "The :attribute must be a valid zone.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
