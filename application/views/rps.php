<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('rps/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah RPS</a>
        <a href="<?= base_url('rps/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Cetak RPS</a>
        <a href="<?= base_url('rps/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i>Export PDF</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Mata kuliah</th>
                    <th>Kode</th>
                    <th>SKS</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($rps as $row) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_matkul ?></td>
                        <td><?= $row->kode ?></td>
                        <td><?= $row->sks ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $row->id_rps ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                            <a href="<?= base_url('rps/delete/' . $row->id_rps) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus RPS ini ?')"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($rps as $row) { ?>
    <div class="modal fade" id="edit<?= $row->id_rps ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit RPS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('rps/edit/' . $row->id_rps) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <input type="text" name="nama_matkul" class="form-control" value="<?= $row->nama_matkul ?>">
                            <?= form_error('nama_matkul', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" value="<?= $row->kode ?>">
                            <?= form_error('kode', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label>SKS</label>
                            <input type="text" name="sks" class="form-control" value="<?= $row->sks ?>">
                            <?= form_error('sks', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Kosongkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>