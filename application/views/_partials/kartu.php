<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, <?= $this->session->userdata('no_induk'); ?></h4>
                    <p class="mb-0">Selamat Datang di EVoting Pilketos</p>
                </div>
            </div>
        </div>
    </div>

    <?php
                          if($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                          <?php
                          }
                          ?>
                          <?php
                          if($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                          <?php
                          }
                          ?>
    
    
    <div class="row">
    
        <?php foreach ($kandidat as $data) : ?>
        <div class="col">
            <div class="card">
                <h3 class="card-title text-center"><?= $data->no_kandidat; ?></h3>
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $data->nama_kandidat; ?></h5>
                    <img src="<?= base_url('gambar/' . $data->foto_kandidat); ?>" style="height: 200px; width: 200px;" class="rounded mx-auto d-block" alt="...">
                    <div class="card-text text-center"><?= $data->visi_misi; ?></div>
                    <a class="btn btn-primary btn-block btn-lg md-5" href="<?= base_url('utama/simpan/' . $data->id_kandidat); ?>">Pilih</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>