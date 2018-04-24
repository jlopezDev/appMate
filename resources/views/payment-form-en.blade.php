@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="payment-container">
                    <div>
                        <div class="content mb-30">
                            <h3 class="title">MATE appreciates your commitment to art and culture:</h3>
                            <small>Thanks to your donation and support, we are able to continue presenting seminal exhibitions and expanding our educational programme. MATE is committed to stimulating the creative industries in the children and young people of Peru and fuelling an appreciation for visual culture in our visitors.</small>
                        </div>
                        <div class="line-down"></div>
                        <form id="payment-form">
                            <input type="hidden" name="lang" id="lang" value="en" />
                            <ul class="steps-name">
                                <li class="step-1 active">Amount</li>
                                <li class="step-2">Name</li>
                                <li class="step-3">Payment</li>
                            </ul>
                            <ul class="steps">
                                <li class="step-1 arrow-right active">1</li>
                                <li class="step-2 arrow-right">2</li>
                                <li class="step-3 arrow-right-last">3</li>
                            </ul>
                            <fieldset id="step-1">
                                <div class="row">
                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="10" type="button">$ 10</button>
                                    </div>
                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="20" type="button">$ 20</button>
                                    </div>
                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="30" type="button">$ 30</button>
                                    </div>

                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="100" type="button">$ 100</button>
                                    </div>
                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="250" type="button">$ 250</button>
                                    </div>
                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="500" type="button">$ 500</button>
                                    </div>

                                    <div class="col-md-4 container-quantity">
                                        <button class="btn btn-block btn-quantity" data-value="1000" type="button">$ 1,000</button>
                                    </div>
                                    <div class="col-md-8 container-quantity">
                                        <input type="number" class="form-control custom-quantity" name="other_amount" id="other_amount" placeholder="Other amount...">
                                    </div>
                                </div>
                                <div class="row" id="first-next-button" style="display: none;">
                                    <div class="col-md-12 container-input">
                                        <p class="error-form">Enter or select an amount to donate.</p>
                                        <button type="button" class="btn btn-block next action-button">Next</button>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="step-2">
                                <div class="row">
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="first_name">* First name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="last_name">* Last name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <div class="form-group">
                                            <label for="country">* Country</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Select...</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Réunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <div class="form-group">
                                            <label for="address">* Address</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <div class="form-group">
                                            <label for="province">* Province / State / Region</label>
                                            <input type="text" class="form-control" id="province" name="province">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="zip_code">* Postal code</label>
                                            <input type="text" class="form-control" name="zip_code" id="zip_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="cell_phone">* Phone</label>
                                            <input type="text" class="form-control" name="cell_phone" id="cell_phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <div class="form-group">
                                            <label for="province">* Email</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <p class="error-form">Please correct the problems shown above.</p>
                                        <input type="button" name="next" class="btn btn-block next action-button" value="Next"/>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="step-3">
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <div class="form-group">
                                            <label for="number" style="display: block;">* Card number <img src="assets/img/donar-mate.png" style="float: right;"></label>
                                            <input type="text" size="20" data-stripe="number" autocomplete="cc-number" class="form-control" id="number" name="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="exp_month">* Month</label>
                                            <select name="exp_month" data-stripe="exp_month" id="exp_month" class="form-control">
                                                <option value="">Seleccionar...</option>
                                                <option value="01">Enero</option>
                                                <option value="02">Febrero</option>
                                                <option value="03">Marzo</option>
                                                <option value="04">Abril</option>
                                                <option value="05">Mayo</option>
                                                <option value="06">Junio</option>
                                                <option value="07">Julio</option>
                                                <option value="08">Agosto</option>
                                                <option value="09">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 container-input">
                                        <div class="form-group">
                                            <label for="exp_year">* Year</label>
                                            <select name="exp_year" id="exp_year" data-stripe="exp_year" class="form-control">
                                                <option value="">Seleccionar...</option>
                                                <?php for ($i = 2010; $i <= 2050; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 container-input">
                                        <div class="form-group">
                                            <label for="cvc">* CVV</label>
                                            <input type="text" size="4" data-stripe="cvc" class="form-control" id="cvc" name="cvc">
                                        </div>
                                    </div>
                                    <div class="col-md-8 container-input">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <label>
                                            <input type="checkbox" id="chk-recurrent" name="recurrent" /> I want my donation to be recurrent.
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="recurrent-payments" style="display: none;">
                                    <div class="col-md-6 container-quantity">
                                        <button class="btn btn-block btn-recurrent-mode" data-mode="mensual" type="button">Monthly</button>
                                    </div>
                                    <div class="col-md-6 container-quantity">
                                        <button class="btn btn-block btn-recurrent-mode" data-mode="anual" type="button">Yearly</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 container-input">
                                        <button type="submit" class="btn btn-block submit action-button">Accept</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pull-right">
                <h2 class="message-page">
                    Art gives you power to communicate,<br>
                    eyes to value, mind to create<br>
                    and wings to fly.<br>
                </h2>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection