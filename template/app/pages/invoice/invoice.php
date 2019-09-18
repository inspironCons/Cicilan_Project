<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    
<style>
    .invoice-box {
    max-width: 283px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 10px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td{
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }
    
    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}

/** RTL **/
.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
    text-align: right;
}

.rtl table tr td:nth-child(2) {
    text-align: left;
}
</style>
</head>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<body>
    <div id = "print" class="invoice-box">

        <table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2">
                <table>
                    <tr align="center">
                        <td>
                            <small style="float:left;font-size:7px;margin-top:-10px">Waktu : <?=date('H:i:s')?></small>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr align="center">
                            <td>
                                No Faktur #:<?=$data['dataTagihan']['noFaktur']?> <br>
                                Tanggal : <?=longdate_indo($data['dataTagihan']['tanggalBayar'])?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Kue lebaran, Inc.<br>
                                12345 Cikembar Road<br>
                                Sukabumi, Jawa Barat
                            </td>
                            
                            <td>
                                Muhammad Ramdhon<br>
                                0858-6315-2125<br>
                                kuelebaran@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Nama Konsumen : <?=$data['datakonsumen']['nama']?>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Pembayaran
                </td>
                
                <td>
                    Harga
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Pembayaran <b><?=bulanTahun($data['dataTagihan']['jatuhTempo'])?></b>
                </td>
                
                <td>
                <?=rupiah($data['dataTagihan']['jumlah'])?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?=rupiah($data['dataTagihan']['jumlah'])?>
                </td>
            </tr>

            <tr>
                <td>
                <small>*simpan bukti pembayaran ini</small>
                </td>
            </tr>
        </table>
    </div>

           
</body>

</html>