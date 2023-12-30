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
    
    <div class="col">
            <div class="card">
                <h1 class="card-title text-center">Voting Rules</h1>
                <div class="card-body">
                    <p class="card-text text-center">
                        1. Hanya satu pemilihan yang diizinkan per pengguna.
                    </p>
                    <p class="card-text text-center">
                        2. Pilihlah dengan cermat berdasarkan visi dan misi kandidat.
                    </p>
                    <p class="card-text text-center">
                        3. Setelah memilih, keputusan tidak dapat diubah.
                    </p>
                    <p class="card-text text-center">
                        4. Pastikan untuk logout setelah selesai memilih.
                    </p>
                    <p class="card-text text-center">
                        5. Menu Logout ada di pojok kanan atas.
                    </p>
                </div>
            </div>
        </div>
        <script>
            function startCountdown() {
                var countdown = 3;
                var countdownElement = document.getElementById('countdown');
                
                function updateCountdown() {
                    countdownElement.innerHTML = countdown;
                    countdown--;

                    if (countdown < 0) {
                        window.location.href = "<?= base_url('utama/pilih'); ?>";
                    } else {
                        setTimeout(updateCountdown, 1000);
                    }
                }
                updateCountdown();
            }
        </script>
        <a class="btn btn-primary btn-block btn-lg md-5" onclick="startCountdown()"><p id="countdown" class="text-center">3</p></a>
    </div>
</div>