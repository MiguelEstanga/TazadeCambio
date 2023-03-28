<?php
    
    Class Controllerapi{

        public $cambio; 
        public $json;
        /* 
          un array con el nombre de todas las monedas y como clave el nombre del pais
        */
        public $countries = array(
            "Afghanistan" => "AFN",
            "Albania" => "ALL",
            "Germany" => "EUR",
            "Andorra" => "EUR",
            "Angola" => "AOA",
            "Antigua and Barbuda" => "XCD",
            "Saudi Arabia" => "SAR",
            "Algeria" => "DZD",
            "Argentina" => "ARS",
            "Armenia" => "AMD",
            "Australia" => "AUD",
            "Austria" => "EUR",
            "Azerbaijan" => "AZN",
            "Bahamas" => "BSD",
            "Bangladesh" => "BDT",
            "Barbados" => "BBD",
            "Bahrain" => "BHD",
            "Belgium" => "EUR",
            "Belize" => "BZD",
            "Benin" => "XOF",
            "Belarus" => "BYN",
            "Myanmar" => "MMK",
            "Bolivia" => "BOB",
            "Bosnia and Herzegovina" => "BAM",
            "Botswana" => "BWP",
            "Brazil" => "BRL",
            "Brunei" => "BND",
            "Bulgaria" => "BGN",
            "Burkina Faso" => "XOF",
            "Burundi" => "BIF",
            "Bhutan" => "BTN",
            "Cape Verde" => "CVE",
            "Cambodia" => "KHR",
            "Cameroon" => "XAF",
            "Canada" => "CAD",
            "Qatar" => "QAR",
            "Chad" => "XAF",
            "Chile" => "CLP",
            "China" => "CNY",
            "Cyprus" => "EUR",
            "Colombia" => "COP",
            "Comoros" => "KMF",
            "Congo" => "CDF",
            "North Korea" => "KPW",
            "South Korea" => "KRW",
            "Ivory Coast" => "XOF",
            "Costa Rica" => "CRC",
            "Croatia" => "HRK",
            "Cuba" => "CUP",
            "Denmark" => "DKK",
            "Dominica" => "XCD",
            "Ecuador" => "USD",
            "Egypt" => "EGP",
            "El Salvador" => "USD",
            "United Arab Emirates" => "AED",
            "Eritrea" => "ERN",
            "Slovakia" => "EUR",
            "Slovenia" => "EUR",
            "Venezuela" => "VES",
            "Spain" => "EUR",
            "United States" => "USD",
            "Estonia" => "EUR",
            "Eswatini" => "SZL",
            "Ethiopia" => "ETB",
            "Philippines" => "PHP",
            "Finland" => "EUR",
            "Fiji" => "FJD",
            "France" => "EUR",
            "Gabon" => "XAF",
            "Gambia" => "GMD",
            "Georgia" => "GEL",
            "Ghana" => "GHS",
            "Grenada" => "XCD",
            "Greece" => "EUR",
            "Guatemala" => "GTQ",
            "Guinea" => "GNF",
            "Equatorial Guinea" => "XAF",
            "Guinea-Bissau" => "XOF",
            "Guyana" => "GYD",
            "Haiti" => "HTG",
            "Honduras" => "HNL",
            "Hungary" => "HUF",
            "India" => "INR",
            "Indonesia" => "IDR",
            "Iraq" => "IQD",
            "Iran" => "IRR",
            "Ireland" => "EUR",
            "Iceland" => "ISK",
            "Marshall Islands" => "USD",
            "Solomon Islands" => "SBD",
            "Israel" => "ILS",
            "Italy" => "EUR",
            "Jamaica" => "JMD",
            "Japan" => "JPY",
            "Jordan" => "JOD",
            "Kazakhstan" => "KZT",
            "Kenya" => "KES",
            "Kyrgyzstan" => "KGS",
            "Kiribati" => "AUD",
            "Kosovo" => "EUR",
            "Kuwait" => "KWD",
            "Laos" => "LAK",
            "Lesotho" => "LSL",
            "Latvia" => "EUR",
            "Lebanon" => "LBP",
            "Liberia" => "LRD",
            "Libya" => "LYD",
            "Liechtenstein" => "CHF",
            "Lithuania" => "EUR",
            "Luxembourg" => "EUR",
            "North Macedonia" => "MKD",
            "Madagascar" => "MGA",
            "Malaysia" => "MYR",
            "Malawi" => "MWK",
            "Maldives" => "MVR",
            "Mali" => "XOF",
            "Malta" => "EUR",
            "Morocco" => "MAD",
            "Mauritius" => "MUR",
            "Mauritania" => "MRU",
            "Mexico" => "MXN",
            "Micronesia" => "USD",
            "Moldova" => "MDL",
            "Monaco" => "EUR",
            "Mongolia" => "MNT",
            "Montenegro" => "EUR",
            "Mozambique" => "MZN",
            "Namibia" => "NAD",
            "Nauru" => "AUD",
            "Nepal" => "NPR",
            "Nicaragua" => "NIO",
            "Niger" => "XOF",
            "Nigeria" => "NGN",
            "Norway" => "NOK",
            "New Zealand" => "NZD",
            "Oman" => "OMR",
            "Netherlands" => "EUR",
            "Pakistan" => "PKR",
            "Palau" => "USD",
            "Palestine" => "",
            "Panama" => "PAB",
            "Papua New Guinea" => "PGK",
            "Paraguay" => "PYG",
            "Peru" => "PEN",
            "Poland" => "PLN",
            "Portugal" => "EUR",
            "United Kingdom" => "GBP",
            "Central African Republic" => "XAF",
            "Czech Republic" => "CZK",
            "Democratic Republic of the Congo" => "CDF",
            "Dominican Republic" => "DOP",
            "Rwanda" => "RWF",
            "Romania" => "RON",
            "Russia" => "RUB",
            "Samoa" => "WST",
            "Saint Kitts and Nevis" => "XCD",
            "San Marino" => "EUR",
            "Saint Vincent and the Grenadines" => "XCD",
            "Saint Lucia" => "XCD"
        );

        /*
            Parametro1 nombre en ingles del pais que decea combertir
            Parametro2 nombre en ingles del pais con la moneda que decea combertir
            Parametro3 float con la cantidad que decea combertir
        */
        public function __construct($nombrepais1 , $nombrepais2 , $cantidad){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to={$this->countries[$nombrepais1]}&from={$this->countries[$nombrepais2]}&amount={$cantidad}",
              CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: WWMRlrq561ibWkz2XIbxk6hxjVAReRp1"
              ),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET"
            ));
            
            $datajson = curl_exec($curl);
            $this->json = json_decode($datajson);
            curl_close($curl);
        }

        //devuelve el total
       public function getTotal(){
            return $this->json->result;
       }  
       //devuelve la cotizacion conrespecto a las 2 monedas
       public function getCotizacion(){
            return $this->json->info->rate;
       }
       //devuelve la cantidad de la moneda a combertir
       public function getCantidad(){
            return $this->json->query->amount;
       }
       //devuelve la moneda1
       public function getMoneda1(){
            return $this->json->query->from;
       }
       //devuelve la moneda2
       public function getMoneda2(){
        return $this->json->query->to;
       }
       // devuelve todo el objeto
       public function getData(){
            return $this->json;
       }
    }
?>

