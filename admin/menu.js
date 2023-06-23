function loadHome() {
  $.get("home.php", function(data) {
    $("#allContent").html(data);
  });
}
function loadPasien() {
  $.get("pasien.php", function(data) {
    $("#allContent").html(data);
  });
}
function loadPegawai() {
  $.get("pegawai.php", function(data) {
    $("#allContent").html(data);
  });
}
function loadtpegawai() {
  $.get("tpegawai.php", function(data) {
    $("#allContent").html(data);
  });
}