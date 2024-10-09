import Dropdownbox from "http://localhost/pembayaranSPP/module/dropdown.js";
import { aside } from "http://localhost/pembayaranSPP/module/tags.js";
import { chartBar } from "http://localhost/pembayaranSPP/module/chart.js";

const dirname = "http://localhost/pembayaranSPP/";
const urlnow = window.location.pathname.split('/');


// SCRIPT MAIN
aside.addEventListener('click', (e) => {
  let target = (e.target.tagName != 'A') ? e.target.parentElement : e.target;
  
  if (target.id == "siswa") {
    e.preventDefault();
    Dropdownbox(target.nextElementSibling);
    if (target.nextElementSibling.classList.contains("actives")) {
      target.querySelector('.toggle').style.rotate = '90deg';
      target.querySelector('.toggle').style.transition = 'all .5s ease';
    } else {
      target.querySelector('.toggle').style.rotate = '0deg';
      target.querySelector('.toggle').style.transition = 'all .5s ease';
    }
  }
});
// END SCRIPT MAIN

// SCRIPT DASHBOARD

// END SCRIPT DASHBOARD

// SCRIPT KELAS
if (urlnow[2] == "kelas") {
  const chartKelas = document.getElementById('chartKelas');
  chartBar(chartKelas, ["RPL","AKT","TKJ","MM"], [30,20,40,20],'Jurusan');

  const formJurusan = document.getElementById('form-jurusan');
  const formKelas = document.getElementById('form-kelas');
  const btnJurusan = document.getElementById('btn-jurusan');
  const btnKelas = document.getElementById('btn-kelas');


  btnKelas.addEventListener('click', function(element) {
    element.preventDefault();
    Dropdownbox(formKelas)
  });

  btnJurusan.addEventListener('click', function(element) {
     element.preventDefault();  
     Dropdownbox(formJurusan);
  });
}
// END SCRIPT KELAS

// SCRIPT SISWA
if (urlnow[2] == "siswa") {
  const btnDropdown = document.getElementById('btn-dropdown');
  const boxDropdown = document.getElementById('box-dropdown');

  btnDropdown.addEventListener('click', function() {
   Dropdownbox(boxDropdown);
  });

}

// END SCRIPT SISWA













      