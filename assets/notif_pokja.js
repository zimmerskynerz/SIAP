// CRUD Berkas Pengajuan
$('.berhasil_tambah_komentar').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berkas Persyaratan Berhasil Dikonfirmasi!',
        'success'
    )
})
$('.berhasil_simpan_konfirmasi').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berhasil Konfirmasi Pengajuan!',
        'success'
    )
})
// CRUD PROFILE
$('.berhasil_ubah_password').show(function() {
    Swal.fire(
        'Berhasil!',
        'Password Berhasil Diubah!',
        'success'
    )
})
$('.berhasil_ubah_identitas').show(function() {
    Swal.fire(
        'Berhasil!',
        'Identitas Berhasil Diubah!',
        'success'
    )
})
$('.gagal_password_beda').show(function() {
    Swal.fire(
        'Opsss..!',
        'Password Anda Berbeda!',
        'error'
    )
})
$('.gagal_password_lama').show(function() {
    Swal.fire(
        'Opsss..!',
        'Password Lama Anda Salah!',
        'error'
    )
})