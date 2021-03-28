<div class="modal fade" id="OPD_detail" tabindex="-1" role="dialog" aria-labelledby="OPD_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OPD_detailTitle">
                    Detail Data OPD!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('agendaris/crudopd'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="id_opd" name="id_opd" hidden type="text" value="" class="form-control" placeholder="Masukkan Nama Organisasi Perangkat Daerah" required>
                    <input id="nm_opd" name="nm_opd" type="text" value="" class="form-control" placeholder="Masukkan Nama Organisasi Perangkat Daerah" required>
                </div>
                <div class="form-group">
                    <textarea id="keterangan" name="keterangan" type="text" value="" class="form-control" placeholder="Keterangan Singkat OPD"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="hapus_opd" name="hapus_opd" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_opd" name="ubah_opd" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#detail_opd", function() {
        var id_opd = $(this).data('id_opd');
        var nm_opd = $(this).data('nm_opd');
        var keterangan = $(this).data('keterangan');
        $(".modal-body#detail_body #nm_opd").val(nm_opd);
        $(".modal-body#detail_body #id_opd").val(id_opd);
        $(".modal-body#detail_body #keterangan").val(keterangan);
    })
</script>