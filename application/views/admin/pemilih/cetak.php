<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Data Pemilih</title>
  </head>
  <body onload="window.print();">
    <div class="container py-5">
    <h1>Laporan Data Kandidat Sistem Evoting Pilketos</h1>
        <div class="row">
            <div class="col">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilih</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Induk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($pemilih as $data) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->nama_pemilih; ?></td>
                    <td><?= $data->jenis_kelamin; ?></td>
                    <td><?= $data->no_induk; ?></td>
                    <td>
                      <?php if ($data->status_pemilih == 'sudah_memilih') : ?>
                        <p class="badge bg-success">Sudah Memilih</p>
                      <?php else : ?>
                        <p class="badge bg-danger">Belum Memilih</p>
                      <?php endif; ?>
                    </td>
                </tr>
                <?php
                $no++;
                endforeach;
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>