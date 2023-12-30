<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="<?= site_url('admin/utama'); ?>"><i class="icon icon-home"></i><span class="nav-text">Dashboard</span></a>
                    </li>

                    <li class="nav-label">Kelola</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Kelola</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('admin/kandidat/index'); ?>">Kandidat</a></li>
                            <li><a href="<?= base_url('admin/pemilih/index'); ?>">Pemilih</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Report</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-bug"></i><span class="nav-text">Report</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('admin/kandidat/report'); ?>">Kandidat</a></li>
                            <li><a href="<?= base_url('admin/pemilih/report'); ?>">Pemilih</a></li>
                            <li><a href="<?= base_url('admin/kandidat/suara'); ?>">Hasil Suara</a></li>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div> 