const tombolCari = document.querySelector(".tombol-cari");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

// event ketika tombol cari diklik
keyword.addEventListener("keyup", function () {
  //   // buat objek ajax
  //   const xhr = new XMLHttpRequest();
  //   // cek kesiapan ajax
  //   xhr.onreadystatechange = function () {
  //     if (xhr.readyState === 4 && xhr.status === 200) {
  //       container.innerHTML = xhr.responseText;
  //     }
  //   };
  //   // eksekusi ajax
  //   xhr.open("GET", "ajax/ajax_cari.php?keyword=" + keyword.value, true);
  //   xhr.send();

  //   fetch
  fetch("ajax/ajax_cari.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((data) => {
      container.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
});
