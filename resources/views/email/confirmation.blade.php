<!DOCTYPE html>
<html lang="es">

<head>
    <title>Último paso para activar tu cuenta de CAFSI</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="margin:0; padding: 0; background-color:#FFFFFF !important; ">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:0; margin:0; ">
        <tr>
            <td style=" font-size:0;"><span></span></td>
            <td valign="top" style="text-align: center; width:640px;max-width:640px;">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="background-color:#FFFFFF padding:0; margin:0; border:0;">
                    <tr>
                        <td style="text-align: center; padding: 32px 63px 0 63px;" id="main-pad">

                            <a href="{{ route('landing') }}" target="_blank">
                                <img alt="CAFSI" src="img/logoCAFSI.png" width="125px"
                                    style="max-height:125px; width:125px; *width:125px; *height=125px;" />
                            </a>

                            <!-- Content !-->
                            <h1
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 24px; line-height: 31px; color:#777777; padding: 0; margin: 28px 0 32px 0; font-weight: 400; text-align:left; text-decoration: none;">
                                <a href="{{ route('landing') }}" style="text-decoration:none;color:#777777;">
                                    <span style="display:block;"> {{$email}} </span>
                                </a>
                            </h1>

                            <p
                                style="font-size: 16px; line-height:20px; color: #333333; padding: 0; margin: 0 0 33px 0; text-align: left; font-family: Helvetica, Arial, sans-serif;">
                                Te falta un paso para activar tu cuenta de CAFSI.
                                &nbsp;
                                Haz clic en el siguiente botón para confirmar tu dirección de correo electrónico:</p>

                            <table cellpadding="0" cellspacing="0" style="padding:0; margin:0; border:0; width:213px;">
                                <tr>
                                    <td id="bottom-button-bg" valign="top"
                                        style="text-align: center; border-radius:3px; padding: 12px 20px 16px 20px; background-color: #0d3713;">
                                        
                                    </td>
                                </tr>
                            </table>

                            <!-- Regards !-->
                            <p
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height:20px;color: #333333; padding: 0; margin: 35px 0 0 0; text-align: left;">
                                Saludos cordiales,<br />—CAFSI
                            </p>
                            <!-- end of Regards !-->

                        </td>
                    </tr>
                </table>
            </td>
            <td style="font-size:0;"><span></span></td>
        </tr>

        <!-- Copyrights !-->
        <tr>
            <td style="font-size:0;"><span></span></td>
            <td valign="middle" align="center" style="width:640px;max-width:640px; padding: 25px 0 28px 0;"
                id="copyrights-block">
                <p
                    style="font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height:20px; color:#999999; padding: 0; margin: 4px 0 22px 0;">
                    CAFSI {{ Date('Y')}} </p>
            </td>
            <td style="font-size:0;"><span></span></td>
        </tr>
        <!-- end of Copyrights !-->

    </table>

    <style type="text/css">
        #bottom-button-bg {
            background-color: transparent !important;
            padding: 0 !important;
        }

        #bottom-button {
            padding: 12px 20px 12px 20px !important;
        }

        @media only screen and (max-width: 480px) {
            #main-pad {
                padding: 32px 16px 0 16px !important;
            }

            #copyrights-block {
                padding: 25px 0 27px 0 !important;
            }
        }

        /* Text and background color for dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                color: #FF0000;
                background-color: #FFFFFF;
            }
        }
    </style>
</body>

</html>