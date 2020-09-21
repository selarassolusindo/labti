<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigation-label">MENU</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="<?php if($this->uri->uri_string() == 'beranda-main') { echo 'active'; } ?>">
            <a href="<?php echo site_url('beranda-main');?>">
            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
            <span class="pcoded-mtext">Dashboard</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <?php if($this->session->userdata('level') == "admin"): ?>


        <!-- <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>SR</b></span>
                <span class="pcoded-mtext">Surat</span>
                <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                        <span class="pcoded-mtext">Pengumuman Praktikum</span>
                        <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                    <span class="pcoded-mtext">Pembukaan Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                    <span class="pcoded-mtext">Pengiriman Data Nilai</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                        <span class="pcoded-mtext">Pengolahan Dana</span>
                        <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                    <span class="pcoded-mtext">Pengajuan Dana</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                    <span class="pcoded-mtext">LPJ</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
           </li>
        </ul>    -->
        <!-- <div class="pcoded-navigation-label">Master</div>         -->
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'list-praktikum') { echo 'active'; } ?>">
                <a href="<?php echo site_url('list-praktikum');?>">
                <span class="pcoded-micon"><i class="ti-book"></i><b>DP</b></span>
                <span class="pcoded-mtext">Data Praktikum</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <li class="<?php if($this->uri->uri_string() == 'dosen' || $this->uri->uri_string() == 'asisten' || $this->uri->uri_string() == 'mahasiswa') { echo 'pcoded-hasmenu active pcoded-trigger';}else{ echo 'pcoded-hasmenu';} ?>">
           <a href="javascript:void(0)">
           <span class="pcoded-micon"><i class="ti-id-badge"></i><b>DM</b></span>
           <span class="pcoded-mtext">Master</span>
           <span class="pcoded-mcaret"></span>
           </a>
           <ul class="pcoded-submenu">
                <li class="<?php if($this->uri->uri_string() == 'dosen') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('dosen');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Dosen</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if($this->uri->uri_string() == 'asisten') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('asisten');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Asisten</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if($this->uri->uri_string() == 'mahasiswa') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('mahasiswa');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Mahasiswa</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>

        <div class="pcoded-navigation-label">Praktikum</div>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'validasi') { echo 'active'; } ?>">
                <a href="<?php echo site_url('validasi');?>">
                <span class="pcoded-micon"><i class="ti-check-box"></i><b>VL</b></span>
                <span class="pcoded-mtext">Validasi</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'kelompok-dan-penilaian') { echo 'active'; } ?>">
                <a href="<?php echo site_url('kelompok-dan-penilaian');?>">
                <span class="pcoded-micon"><i class="ti-layout-media-center-alt"></i><b>KP</b></span>
                <span class="pcoded-mtext">Kelompok & Penilaian</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'pembukaan-praktikum') { echo 'active'; } ?>">
                <a href="<?php echo site_url('pembukaan-praktikum');?>">
                <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>KP</b></span>
                <span class="pcoded-mtext">Pembukaan Praktikum</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'jadwal-pelaksanaan') { echo 'active'; } ?>">
                <a href="<?php echo site_url('jadwal-pelaksanaan');?>">
                <span class="pcoded-micon"><i class="ti-calendar"></i><b>JP</b></span>
                <span class="pcoded-mtext">Jadwal Pelaksanaan</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Operasional</div>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'pengumuman') { echo 'active'; } ?>">
                <a href="<?php echo site_url('pengumuman');?>">
                <span class="pcoded-micon"><i class="ti-headphone-alt"></i><b>TB</b></span>
                <span class="pcoded-mtext">Pengumuman</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'surat') { echo 'active'; } ?>">
                <a href="<?php echo site_url('surat');?>">
                <span class="pcoded-micon"><i class="ti-email"></i><b>PN</b></span>
                <span class="pcoded-mtext">Pengelolaan Surat</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'accounting') { echo 'active'; } ?>">
                <a href="<?php echo site_url('accounting');?>">
                <span class="pcoded-micon"><i class="ti-money"></i><b>AC</b></span>
                <span class="pcoded-mtext">Accounting</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <!-- <ul class="pcoded-item pcoded-left-item">
          <li class="<?php //if($this->uri->uri_string() == 'peserta') { echo 'active'; } ?>">
                <a href="<?php //echo site_url('peserta');?>">
                <span class="pcoded-micon"><i class="ti-calendar"></i><b>IP</b></span>
                <span class="pcoded-mtext">Data Peserta</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> -->


        <!-- <ul class="pcoded-item pcoded-left-item">
          <li class="<?php //if($this->uri->uri_string() == 'dosen') { echo 'active'; } ?>">
                <a href="<?php //echo site_url('dosen');?>">
                <span class="pcoded-micon"><i class="ti-id-badge"></i><b>DD</b></span>
                <span class="pcoded-mtext">Data Dosen</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php //if($this->uri->uri_string() == 'peserta') { echo 'active'; } ?>">
                <a href="<?php //echo site_url('peserta');?>">
                <span class="pcoded-micon"><i class="ti-id-badge"></i><b>DA</b></span>
                <span class="pcoded-mtext">Data Asisten</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php //if($this->uri->uri_string() == 'peserta') { echo 'active'; } ?>">
                <a href="<?php //echo site_url('peserta');?>">
                <span class="pcoded-micon"><i class="ti-id-badge"></i><b>DM</b></span>
                <span class="pcoded-mtext">Data Mahasiswa</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> -->
        <?php endif; ?>


        <?php if($this->session->userdata('level') == "dosen"): ?>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if($this->uri->uri_string() == 'info') { echo 'active'; } ?>">
                <a href="<?php echo site_url('info');?>">
                <span class="pcoded-micon"><i class="ti-calendar"></i><b>KL</b></span>
                <span class="pcoded-mtext">Kelompok</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
          <li class="<?php if($this->uri->uri_string() == 'penilaian') { echo 'active'; } ?>">
                <a href="<?php echo site_url('penilaian');?>">
                <span class="pcoded-micon"><i class="ti-calendar"></i><b>PN</b></span>
                <span class="pcoded-mtext">Penilaian</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <?php endif; ?>

        <?php if($this->session->userdata('level') == "mahasiswa"): ?>
        <li class="<?php if($this->uri->uri_string() == 'info') { echo 'active'; } ?>">
            <a href="<?php echo site_url('info');?>">
            <span class="pcoded-micon"><i class="ti-layout-list-thumb"></i><b>KHP</b></span>
            <span class="pcoded-mtext">Kartu Hasil Praktikum</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="<?php if($this->uri->uri_string() == 'jadwal') { echo 'active'; } ?>">
            <a href="<?php echo site_url('jadwal');?>">
            <span class="pcoded-micon"><i class="ti-calendar"></i><b>JP</b></span>
            <span class="pcoded-mtext">Jadwal Pelaksanaan</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li><li class="<?php if($this->uri->uri_string() == 'daftar') { echo 'active'; } ?>">
            <a href="<?php echo site_url('daftar');?>">
            <span class="pcoded-micon"><i class="ti-agenda"></i><b>DF</b></span>
            <span class="pcoded-mtext">Daftar Praktikum</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="<?php if($this->uri->uri_string() == 'prosedur') { echo 'active'; } ?>">
            <a href="<?php echo site_url('prosedur');?>">
            <span class="pcoded-micon"><i class="ti-comments"></i><b>PP</b></span>
            <span class="pcoded-mtext">Prosedur Pendaftaran</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li>

        <div class="pcoded-navigation-label">Laporan</div>
        <li class="<?php if($this->uri->uri_string() == 'pesan/tulis-pesan' || $this->uri->uri_string() == 'pesan/pesan-terkirim' || $this->uri->uri_string() == 'pesan/pesan-masuk') { echo 'pcoded-hasmenu active pcoded-trigger';}else{ echo 'pcoded-hasmenu';} ?>">
           <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="ti-email"></i><b>KP</b></span>
            <span class="pcoded-mtext">Pesan</span>
            <span class="pcoded-mcaret"></span>
           </a>
           <ul class="pcoded-submenu">
                <li class="<?php if($this->uri->uri_string() == 'pesan/tulis-pesan') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('pesan/tulis-pesan');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Tulis Pesan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if($this->uri->uri_string() == 'pesan/pesan-terkirim') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('pesan/pesan-terkirim');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Pesan Terkirim</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if($this->uri->uri_string() == 'pesan/pesan-masuk') { echo 'active'; } ?>">
                    <a href="<?php echo site_url('pesan/pesan-masuk');?>">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Pesan Masuk</span>
                        <span class="pcoded-badge label label-danger">0</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</div>
