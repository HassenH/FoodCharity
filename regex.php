<?php
$regexName = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexBirthDate = '#^(((19|20)[0-9]{2})\-{1}(0[1-9]{1}|1[0-2]{1})\-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1}))$#';
$regexCountryAndNationnality = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexAddress = '#^[0-9a-zA-ZÀ-ÖØ-öø-ÿ\.,\-\' ]+$#';
$regexMail = '#^([a-zA-Z0-9À-ÖØ-öø-ÿ\.\-\_]+)@([a-zA-Z0-9À-ÖØ-öø-ÿ\-\_\.]+)\.([a-zA-Z\.]{2,250})$#';
$regexPhoneNumber = '#^([0][1-79]){1}([ ][0-9]{2}){4}$#';
$regexZipCode = '#^[0-9]{5}$#';
$regexNumberWeight = '#^(([1-3]\d{2}|\d{1,2})|(([1-3]\d{2}|\d{1,2}),\d{1,2}))$#';   
$regexNumberDonation = '#^[0-9]{0,3}$#';
?>
