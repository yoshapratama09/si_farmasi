<html>

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .lineTitle {
            border: 0;
            border-style: inset;
            border-top: solid 1px black;
        }

        #isi {
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    <img src="https://play-lh.googleusercontent.com/oVrgg_j_bNBUgRX103S9j9Ri62B7ulPScvSHahF2mrCBK8gWjVgweXGT5a3K1sW3SCFz=w600-h300-pc0xffffff-pd" alt="" style="position: absolute; width:180px; height:auto;">
    <table style="width: 100%; position:absolute;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">RUMAH SAKIT UMUM DAERAH JOMBANG
                    <br>INDONESIA
                </span>
            </td>
        </tr>
    </table>
    <img src="https://dinkes.jatimprov.go.id/upload/gambar/artikel_null.jpg" alt="" style=" width:100px; height:auto; margin-left: 550px;">

    <hr class="lineTitle">

    <p align="center"><?= $title; ?></p>
    <table id="isi" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Kategori</th>
                <th scope="col">Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicine as $m) : ?>
                <tr>
                    <th scope="row"><?= $m['medicine_id']; ?></th>
                    <td><?= $m['medicine_name']; ?></td>
                    <td id="tdF"><?= $m['medicine_type']; ?></td>
                    <td id="tdF"><?= $m['medicine_category']; ?></td>
                    <td><?= $m['stock_qty']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <div class="sign" style="margin-left: 500px;">
        <p class="tgl">Jombang,</p>
        <br>
        <br>
        <br>
        <p class="nama">lorem ipsum</p>
        <p class="nip">123456</p>
    </div>

</body>

</html>