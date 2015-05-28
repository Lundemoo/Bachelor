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
    "boolean"              => ":attribute må være sant eller usant.",
    "confirmed"            => ":attribute konfirmasjon er ugyldig.",
    "date"                 => ":attribute er ikke en gyldig dato.",
    "date_format"          => ":attribute passer ikke formatet som er :format.",
    "different"            => ":attribute og :other må være ulike.",
    "digits"               => ":attribute må være :digits digits.",
    "digits_between"       => " :attribute må være bmellom :min and :max.",
    "email"                => ":attribute må være en gyldig epost adresse.",
    "filled"               => ":attribute feltet er obligatoriskt.",
    "exists"               => "Valgt attributt :attribute er ugyldig.",
    "image"                => ":attribute må være et bilde.",
    "in"                   => "Valgt :attribute er ugyldig.",
    "integer"              => ":attribute må være et tall",
    "ip"                   => "The :attribute mæ være en gyldig IP addresse.",
    "max"                  => [
        "numeric" => ":attribute kan ikke være større enn :max.",
        "file"    => ":attribute kan ikke være større enn :max kilobytes.",
        "string"  => ":attribute kan ikke være større enn :max characters.",
        "array"   => ":attribute kan ikke ha mer enn :max gjenstander.",
    ],
    "mimes"                => "The :attribute må være fil av type: :values.",
    "min"                  => [
        "numeric" => "Kilometer kan ikke ha negativ verdi.",
        "file"    => ":attribute må være minst :min kilobytes.",
        "string"  => ":attribute må være minst :min characters.",
        "array"   => ":attribute må ha minst :min gjnstander.",
    ],
    "not_in"               => "Valgt :attribute er ugyldig.",
    "numeric"              => ":attribute må være et tall.",
    "regex"                => ":attribute format er ugyldig.",
    "required"             => ":attribute feltet er påkrevd",
    "required_if"          => ":attribute feltet er påkrevd når :other er :value.",
    "required_with"        => ":attribute feltet er påkrevd når :values er tilstede.",
    "required_with_all"    => ":attribute feltet er påkrevd når :values er tilstede.",
    "required_without"     => ":attribute feltet er påkrevd når :values er not present.",
    "required_without_all" => ":attribute feltet er påkrevd når ingen :values er tistede.",
    "same"                 => ":attribute og :other må være like.",
    "size"                 => [
        "numeric" => ":attribute mæ være :size.",
        "file"    => ":attribute må være :size kilobytes.",
        "string"  => ":attribute må være :size characters.",
        "array"   => ":attribute å inneholde :size gjenstander.",
    ],
    "unique"               => ":attribute er allerede registrert.",
    "url"                  => ":attribute formatet er ugyldig.",
    "timezone"             => ":attribute må være en gyldig sone.",

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
