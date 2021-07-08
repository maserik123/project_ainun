

<div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('perceraian/importPerceraian/uploaddata') ?> 
                            <div class="row">
                                <div class="col-4">
                                    <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                                <div class="col">
                                   <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
</div>
