<form action="<?= base_url('rps/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Mata Kuliah</label>
        <input type="text" name="nama_matkul" class="form-control">
        <?= form_error('nama_matkul', '<div class="text-small text-danger">', '</div>'); ?>
    </div>

    <div class="form-group">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control">
        <?= form_error('kode', '<div class="text-small text-danger">', '</div>'); ?>
    </div>

    <div class="form-group">
        <label>SKS</label>
        <input type="text" name="sks" class="form-control">
        <?= form_error('sks', '<div class="text-small text-danger">', '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Kosongkan</button>
</form>
