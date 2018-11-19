// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('nl', {
    defaultMessage: "Deze waarde lijkt onjuist.",
    type: {
      email:        "Dit lijkt geen geldig e-mail adres te zijn.",
      url:          "Dit lijkt geen geldige URL te zijn.",
      number:       "Alleen cijfers zijn toegestaan.",
      integer:      "Alleen cijfers zijn toegestaan.",
      digits:       "Alleen cijfers zijn toegestaan.",
      alphanum:     "Alleen letters en cijfers zijn toegestaan."
    },
    notblank:       "Deze waarde mag niet leeg zijn.",
    required:       "Dit veld is verplicht.",
    pattern:        "Alleen de volgende tekens zijn toegestaan: a-z 0-9 ? ! , .",
    min:            "Deze waarde mag niet lager zijn dan %s.",
    max:            "Deze waarde mag niet groter zijn dan %s.",
    range:          "Deze waarde moet tussen %s en %s liggen.",
    minlength:      "Deze tekst is te kort. Deze moet uit minimaal %s karakters bestaan.",
    maxlength:      "Deze waarde is te lang. Deze mag maximaal %s karakters lang zijn.",
    length:         "Deze waarde moet tussen %s en %s karakters lang zijn.",
    equalto:        "Deze waardes moeten identiek zijn.",
    dateiso:  "Deze waarde moet een datum in het volgende formaat zijn: (YYYY-MM-DD).",
    minwords: "Deze waarde moet minstens %s woorden bevatten.",
    maxwords: "Deze waarde mag maximaal %s woorden bevatten.",
    words:    "Deze waarde moet tussen de %s en %s woorden bevatten.",
    gt:       "Deze waarde moet groter dan %s zijn.",
    lt:       "Deze waarde moet kleiner dan %s zijn."
  });
  
  Parsley.setLocale('nl');
