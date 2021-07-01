const flashData = $('.flash-data').data('flashdata');

if(flashData == 'tambah'){
    Swal.fire("Success!", "Berhasil Terdaftar!", "success");
}
if (flashData == 'Username atau Password Salah') {
    Swal.fire("Failed!", "Username atau Password Salah", "warning");
}
if (flashData == 'Username Belum Terdaftar') {
    Swal.fire("Failed!", "Username Belum Terdaftar", "warning");
}

if (flashData == 'Berhasil Login') {
    Swal.fire("Success!", "Berhasil Login", "success");
}