<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device=width,initial-scale=1.0" />
    <title>PunyaLink</title>
    <style type="text/css">
    body {
        margin: 20px;
        background-color: white;
    }

    table {
        border-spacing: 0;
    }

    td {
        padding: 0;
    }

    img {
        border: 0;
    }

    .wrapper {
        width: 100%;
        table-layout: fixed;
        background-color: white;
        padding-bottom: 40px;
    }

    .main {
        background-color: white;
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
        border-spacing: 0;
        font-family: sans-serif;
        color: rgba(35, 172, 57, 1);
    }

    .button {
        background-color: #2F9B2D;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 5px;
        font-weight: bold;

    }

    p {
        display: block;
    }

    @media screen and (max-width:600px) {}
    </style>
</head>

<body>
    <center class="wrapper">
        <table class="main">
            <tr>
                <td style=" background-color: #2F9B2D;text-align:center;padding:10px">
                    <img src="{IMAGE_LOGO}" alt="" width="100">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:20px">
                    <h5 style="color:#2F9B2D;font-size:small ;">{TITLE}</h5>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left:20px;padding-right:20px">
                    <hr>
                    <!-- <p style="color:black;font-size:11px;"><span
                            style="color:black;font-size:11px;font-weight: bold;">Halo
                            {NAME}</span><br>Terima kasih
                        sudah mendaftar pada web PunyaLink cari pekerjaan impianmu. Silahkan klik tombol dibawah ini
                        untuk mengaktivasi akun PunyaLink anda.</p> -->
                    <p style="color:black;font-size:11px;"><span
                            style="color:black;font-size:11px;font-weight: bold;">Halo
                            {NAME}</span><br>{HEADER}</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top: 10px;padding-bottom: 30px;">
                    <a href="{LINK_DIRECT}" style="color: white;" class="button">{TITLE_BUTTON}</a>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left:20px;padding-right:20px">

                    <p style="color:black;font-size:11px;">Terimakasih</p>
                    <hr>

                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-left:20px;padding-right:20px">

                    <p style="color:black;font-size:11px;text-align: center;">Tim Punyalink PT.Punya Kita
                        Semua APL
                        Tower Central Park Lt.26 T3 Jl.Letjen S.Parman No.Kav.28, Jakarta Barat 11470 <br>
                        <span> <a href="https://punyalink.com">https://punyalink.com</a></a></span>
                    </p>


                </td>
            </tr>
        </table>

    </center>

    <!-- <center class="wrapper">
        <table class="main" width="100%">
            <tr>
                <td style="background-color: #2F9B2D;text-align:center;padding:10px">
                    <img src="<?php echo base_url('assets_home/img/about/new_logo_white.png') ?>" alt="" width="100">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:20px">
                    <h5 style="color:#2F9B2D;font-size:small ;">REQUEST RESET PASSWORD</h5>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left:20px;padding-right:20px">
                    <hr>
                    <p style="color:black;font-size:11px;"><span
                            style="color:black;font-size:11px;font-weight: bold;">Halo
                            <?php echo $name ?>,</span><br>Kamu baru saja meminta kami untuk mereset password, Silahkan
                        klik tombol untuk melanjutkan reset password</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top: 10px;padding-bottom: 30px;">
                    <a href="<?php echo $link ?>" class="button">RESET PASSWORd</a>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left:20px;padding-right:20px">

                    <p style="color:black;font-size:11px;">Hiraukan pesan ini jika kamu tidak meminta kami untuk mereset
                        password kamu</p>
                    <p style="color:black;font-size:11px;">Terimakasih.</p>
                    <hr>

                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-left:20px;padding-right:20px">

                    <p style="color:black;font-size:11px;text-align: center;">Tim Punyalink PT.Punya Kita
                        Semua APL
                        Tower Central Park Lt.26 T3 Jl.Letjen S.Parman No.Kav.28, Jakarta Barat 11470 <br>
                        <span> <a href="<?php echo base_url() ?>"><?php echo base_url() ?></a></span>
                    </p>


                </td>
            </tr>
        </table>

    </center> -->
</body>

</html>