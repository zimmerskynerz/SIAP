// CRUD Berkas Pengajuan
$('.berhasil_upload_berkas').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berkas Persyaratan Berhasil Dikirim!',
        'success'
    )
})
$('.berhasil_ubah_berkas').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berkas Persyaratan Berhasil Diupdate!',
        'success'
    )
})
$('.gagal_ubah_berkas').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berkas Persyaratan Gagal Diupdate!',
        'error'
    )
})
$('.berhasil_kirim_berkas').show(function() {
    Swal.fire(
        'Berhasil!',
        'Berkas Persyaratan Berhasil Dikirim!',
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