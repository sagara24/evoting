<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi <?= $this->session->userdata('username'); ?>, welcome back to Admin Pilketos!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-envelope text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Suara Masuk</div>
                            <div class="stat-digit"><?= $pilih; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="fa fa-hand-paper-o text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Pemilih</div>
                                <div class="stat-digit"><?= $pemilih; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="fa fa-users text-info border-info"></i>
                            </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Kandidat</div>
                                <div class="stat-digit"><?= $kandidat; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="fa fa-user-plus text-danger border-danger"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Petugas</div>
                                <div class="stat-digit"><?= $petugas; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
    
        <?php foreach ($kndt as $data) : ?>
        <div class="col">
            <div class="card">
                <h3 class="card-title text-center"><?= $data->no_kandidat; ?></h3>
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $data->nama_kandidat; ?></h5>
                    <?php
                        $cek = $this->db->get_where('pilih', array('id_kandidat'=> $data->id_kandidat))->num_rows();
                        $suara = ($cek / $pilih) * 100;
                    ?>
                    <h6 class="text-center">Hasil Suara Sementara: <?= $cek; ?></h6>
                    <h6 class="text-center">Persentase Suara: <?= $suara . "%"; ?></h6>
                    <img src="<?= base_url('gambar/' . $data->foto_kandidat); ?>" style="height: 200px; width: 200px;" class="rounded mx-auto d-block" alt="...">
                    <p class="card-text text-center"><?= $data->visi_misi; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="col">
    <canvas id="pieChart" width="200" height="200"></canvas>
</div>

    </div>