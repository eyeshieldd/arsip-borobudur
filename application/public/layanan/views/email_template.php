<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Balai Konservasi Borobudur :: Permohonan Layanan</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="<?=base_url()?>" target="_blank"><img src="<?=base_url('assets/public/images/logo-large.png')?>" alt="Borobudur Conservation Archives" style="border:none; height: 100px"></td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Salam,</b>
              <p>Melalui email ini sistem menginformasikan bahwa terdapat permintaan layanan baru. Berikut rincian dari pemohon : </p>
            </td>
          </tr>
          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                  <td width="30%">Nomor Layanan</td>
                  <td><b><?=$nomor_layanan?></b></td>
                </tr>
                <tr>
                  <td width="30%">Nama Pemohon</td>
                  <td><b><?=$nama_pemohon?></b></td>
                </tr>
                <tr>
                  <td width="30%">Email Pemohon</td>
                  <td><b><?=$email?></b></td>
                </tr>
                <tr>
                  <td width="30%">Alamat Pemohon</td>
                  <td><b><?=$alamat?></b></td>
                </tr>
                <tr>
                  <td width="30%">No. Telp Pemohon</td>
                  <td><b><?=$telepon?></b></td>
                </tr>
                <tr>
                  <td width="30%">Jenis Permohonan</td>
                  <td><b><?=$jenis_layanan?></b></td>
                </tr>
                <tr>
                  <td width="30%">Kode Arsip</td>
                  <td>
                    <?php
                      if(isset($detaildata) && !empty($detaildata)){
                        echo "<ol>";
                        foreach ($detaildata as $key => $value) {
                          echo '<li>'.$value["kode_arsip"].'</li>';
                        }
                        echo "</ol>";
                      } else {
                        echo "Tidak ada permohonan arsip.";
                      }
                    ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <p>Mohon perhatian bahwa email ini dikirim secara otomatis oleh sistem dan tidak perlu dibalas.  Terimakasih.</p>
              <b></b>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p> Arsip Pemugaran Candi Borobudur <br>
    </div>
  </div>
</div>
</body>
</html>
