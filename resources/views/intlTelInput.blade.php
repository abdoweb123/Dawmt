@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
    <style>
        #phone{
            padding-left: 90px;
            padding-right: 90px;
        }
        ul#iti-0__country-listbox {
            direction: ltr;
            left: inherit;
        }
    </style>
@endpush

@push('js')
    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
    <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true
            , utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js"
            , onlyCountries: @json(countries()->pluck('country_code'))
        , });
        window.iti = iti;
        iti.setCountry("{{ old('country_code',isset($country_code) ? $country_code : country_code()) }}");
        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
            
            
            
            $('#phone').val('');
            dialCode = iti.getSelectedCountryData().dialCode;
            length = 0;
            $.each(@json(countries()), function (key, element) {
                if (element.phone_code.includes(dialCode)) {
                    length =  element.length;
                }
            });


            $('#phone').attr("minlength", length);
            $('#phone').attr("maxlength", length);
            $('#phone').attr("size", length);

        })
    </script>
@endpush