<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data KPI</strong>
                        <?php if ($this->session->flashdata('pesanhapus')) { ?>
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                Kpi berhasil dihapus.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Faktor Penyebab</th>
                                    <th>Kpi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kpi as $row) { ?>
                                    <tr>
                                        <td><?= $row->tahun ?></td>
                                        <td><?= $row->faktor_penyebab_perceraian ?></td>
                                        <td><?= $row->kpi ?></td>
                                        <td><a href="<?php echo site_url('perceraian/kpi/hapus/') . $row->kpi_id ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Form KPI</strong>

                        <?php if ($this->session->flashdata('pesanbehasil')) { ?>
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                Kpi berhasil ditambahkan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <?php } else if ($this->session->flashdata('pesangagal')) { ?>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                Kpi gagal ditambahkan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <?php } else if ($this->session->flashdata('pesangagalduplikat')) { ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                Kpi gagal ditambahkan, data duplikat.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php } ?>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('perceraian/kpi/tambah') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Tahun</label>
                                <input type="text" id="tahun" name="tahun" placeholder="Input Tahun" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Faktor Penyebab</label>
                                <select name="penyebab" id="penyebab" class="form-control">
                                    <option value="">Faktor Penyebab</option>
                                    <?php foreach ($penyebab as $row) { ?>
                                        <option value="<?= $row->id_faktor_penyebab_perceraian ?>"><?= $row->faktor_penyebab_perceraian ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">KPI</label>
                                <input type="text" id="kpi" name="kpi" placeholder="Input Kpi" class="form-control">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


</div>
</div><!-- .animated -->
</div><!-- .content -->