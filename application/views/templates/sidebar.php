<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                    <h6>Pengadilan Agama</h6>
                    <a class="navbar-brand hidden" href="./">
                        <h4>PA</h4>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?= site_url('dashboard') ?>"> <i class="menu-icon fa fa-home"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-circle"></i><a href="<?php echo site_url('dashboard/faktor_penyebab') ?>">Faktor Penyebab</a></li>
                            <li><i class="fa fa-user-circle"></i><a href="<?php echo site_url('dashboard/faktor_perkara') ?>">Faktor Perkara</a></li>
                            <li><i class="fa fa-map"></i><a href="<?php echo site_url('dashboard/peta') ?>">Peta Kasus</a></li>
                        </ul>
                    </li>
                    <?php if ($this->session->userdata('role') == 'staff') { ?>
                        <li class="active">
                            <a href="<?php echo site_url('perceraian/kpi') ?>"> <i class="menu-icon fa fa-home"></i>Input KPI </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo site_url('perceraian/DataPerceraian') ?>"> <i class="menu-icon fa fa-home"></i>Data Perceraian </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url('perceraian/ImportPerceraian') ?>"> <i class="menu-icon fa fa-upload"></i>Upload Data</a>
                        </li><?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/logout"><i class="fa fa-power-off"></i> Logout</a>

                        </a>

                        <div class="user-menu dropdown-menu">


                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">

                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->