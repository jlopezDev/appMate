<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->
    <title>MATE</title>
    <style type="text/css">
        /* RESET STYLES */
        html { background-color:#E1E1E1; margin:0; padding:0; }
        body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
        table{border-collapse:collapse;}
        table[id=bodyTable] {width:100%!important;margin:auto;max-width:600px!important;color:#7A7A7A;font-weight:normal;}
        img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
        a {text-decoration:none !important;border-bottom: 1px solid;}
        h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

        /* CLIENT-SPECIFIC STYLES */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
        #outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
        img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} /* Force IE to smoothly render resized images. */
        body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */
        .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} /* Force hotmail to push 2-grid sub headers down */

        /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

        /* ========== Page Styles ========== */
        h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
        h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
        h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
        h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
        .flexibleImage{height:auto;}
        .linkRemoveBorder{border-bottom:0 !important;}
        table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

        body, #bodyTable{background-color:#E1E1E1;}
        #emailHeader{background-color:#E1E1E1;}
        #emailBody{background-color:#FFFFFF;}
        #emailFooter{background-color:#E1E1E1;}
        .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
        .emailButton{background-color:#205478; border-collapse:separate;}
        .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
        .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
        .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
        .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
        .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
        .imageContentText {margin-top: 10px;line-height:0;}
        .imageContentText a {line-height:0;}
        #invisibleIntroduction {display:none !important;} /* Removing the introduction text from the view */

        /*FRAMEWORK HACKS & OVERRIDES */
        span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} /* Remove all link colors in IOS (below are duplicates based on the color preference) */
        span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
        span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
        /* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from linking other numbers that look like, but are not phone numbers.  Use these two blocks of code to "unstyle" any numbers that may be linked.  The second block gives you a class to apply with a span tag to the numbers you would like linked and styled.
        Inspired by Campaign Monitor's article on using phone numbers in email: http://www.campaignmonitor.com/blog/post/3571/using-phone-numbers-in-html-email/.
        */
        .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


        /* MOBILE STYLES */
        @media only screen and (max-width: 480px){
            /*////// CLIENT-SPECIFIC STYLES //////*/
            body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

            /* FRAMEWORK STYLES */
            /*
            CSS selectors are written in attribute
            selector format to prevent Yahoo Mail
            from rendering media query styles on
            desktop.
            */
            /*td[class="textContent"], td[class="flexibleContainerCell"] { width: 100%; padding-left: 10px !important; padding-right: 10px !important; }*/
            table[id="emailHeader"],
            table[id="emailBody"],
            table[id="emailFooter"],
            table[class="flexibleContainer"],
            td[class="flexibleContainerCell"] {width:100% !important;}
            td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
            /*
            The following style rule makes any
            image classed with 'flexibleImage'
            fluid when the query activates.
            Make sure you add an inline max-width
            to those images to prevent them
            from blowing out.
            */
            td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
            img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
            img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}


            /*
            Create top space for every second element in a block
            */
            table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}

            /*
            Make buttons in the email span the
            full width of their container, allowing
            for left- or right-handed ease of use.
            */
            table[class="emailButton"]{width:100% !important;}
            td[class="buttonContent"]{padding:0 !important;}
            td[class="buttonContent"] a{padding:15px !important;}

        }

        /*  CONDITIONS FOR ANDROID DEVICES ONLY
        *   http://developer.android.com/guide/webapps/targeting.html
        *   http://pugetworks.com/2011/04/css-media-queries-for-targeting-different-mobile-devices/ ;
        =====================================================*/

        @media only screen and (-webkit-device-pixel-ratio:.75){
            /* Put CSS for low density (ldpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1){
            /* Put CSS for medium density (mdpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1.5){
            /* Put CSS for high density (hdpi) Android layouts in here */
        }
        /* end Android targeting */

        /* CONDITIONS FOR IOS DEVICES ONLY
        =====================================================*/
        @media only screen and (min-device-width : 320px) and (max-device-width:568px) {

        }
        /* end IOS targeting */
    </style>
    <!--[if mso 12]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
    <!--[if mso 14]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
</head>
<body bgcolor="#CCC" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<center style="background-color:#f5f5f5;">
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <table bgcolor="#f9f9f9"  border="0" cellpadding="0" cellspacing="0" width="600" id="emailBody">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#f9f9f9">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="600" class="flexibleContainerCell">

                                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top" class="textContent" style="padding-top: 30px; padding-bottom: 0;">
                                                                <table width="100%" style="text-align: right;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="width: 100%;">
                                                                            <p style="text-align: right; color: #000;">Síguenos en</p>
                                                                        </td>
                                                                        <td>
                                                                            <a href="https://es-es.facebook.com/MuseoMATE" target="_blank" style="text-decoration: none; border: none;">
                                                                                <img src="https://mate.pe/demo-donacion/assets/img/fb-icon.png" border="0" style="height: 30px; display: inline;" border="0" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <img src="https://mate.pe/demo-donacion/assets/img/banner-email.jpg" style="width: 100%;" border="0" />
                                                                <p style="text-align: right">
                                                                    <img src="https://mate.pe/demo-donacion/assets/img/mate-logo.png" style="height: 50px; display: inline;" border="0" />
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top" bgcolor="#f9f9f9">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="600" class="flexibleContainerCell">
                                                    <table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top" bgcolor="#f9f9f9">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="30" cellspacing="0" width="600" class="flexibleContainer">
                                            <tr>
                                                <td valign="top" width="600" class="flexibleContainerCell">
                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td valign="middle" class="textContent">
                                                                <h1 style="text-align: center; font-size: 55px; font-weight: bold; color: #000000;">GRACIAS</h1>

                                                                <p style="text-align: center; font-size: 16px; color: #000000; line-height: 30px;">Gracias a su donación, MATE - organización cultural sin fines de lucro, continuará creciendo e impulsando la cultura en nuestro país, hoy y para las futuras generaciones.</p>

                                                                <p style="text-align: center;">
                                                                    <img src="https://mate.pe/demo-donacion/assets/img/firma-negro.png" border="0" style="display: initial;" />
                                                                </p>
                                                                <br>
                                                                @if($donation->recurrent == "si")
                                                                    <br>
                                                                    <br>
                                                                    <p style="text-align: center; font-size: 12px; color: #000000;">Usted se ha suscrito a una donación recurrente @php if($donation["recurrent_mode"] === "anual") { echo "<b>Anual</b>"; } else{ echo "<b>Mensual</b>"; } @endphp de ${{$donation->amount}}.<br>Si desea cancelar esta suscripción, haga clic <a href="https://mate.pe/cancel-suscription/{{$donation->subscription_stripe_id}}" style="color: #1b1b1b;" target="_blank">aquí</a>.</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
