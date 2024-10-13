import Dropdownbox from "http://localhost/pembayaranSPP/module/Dropdown.js";
import CheckValiditas from "http://localhost/pembayaranSPP/module/CheckValiditas.js";
import { aside, pathUrl, btnSetting } from "http://localhost/pembayaranSPP/module/tags.js";
import { ChartBar } from "http://localhost/pembayaranSPP/module/Chart.js";

const dirname = "http://localhost/pembayaranSPP/";
const urlnow = window.location.pathname.split('/');


// SCRIPT MAIN
if (urlnow[2] != "login" && urlnow[2] != "register") {
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
}

if (pathUrl != null) {
  let path = "";
  let urlnow = window.location.pathname.split('/');
  urlnow.splice(0,2, "Dashboard");
  urlnow.forEach((u, key) => {
    key++;
    if (urlnow[urlnow.length - 1] == u) {
      path += `<a href="${dirname+u}" class="text-blue-500">${u}</a>`;
    } else {
      path += `<a href="${dirname+u}">${u}</a>`;
    }
    if (urlnow.length != key) {
      path += ' / ';
    }
  });
  pathUrl.innerHTML = path;
}

btnSetting.addEventListener('click', function() {
  Dropdownbox(this.nextElementSibling);
});
// END SCRIPT MAIN

// SCRIPT DASHBOARD

// END SCRIPT DASHBOARD

// SCRIPT KELAS
if (urlnow[2] == "kelas") {
  const chartKelas = document.getElementById('chartKelas');
  ChartBar(chartKelas, ["RPL","AKT","TKJ","MM"], [30,20,40,20],'Jurusan');

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
  const btnDropdownShow = document.getElementById('btn-dropdown-show');
  const btnSortId = document.getElementById('btn-sort-id');
  const btnSortNisn = document.getElementById('btn-sort-nisn');
  const btnSortUsername = document.getElementById('btn-sort-username');

  btnDropdownShow.addEventListener('click', function() {
   Dropdownbox(this.nextElementSibling);
  });

  btnSortId.addEventListener('click', function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }
  });

  btnSortNisn.addEventListener('click', function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }
  });

  btnSortUsername.addEventListener('click', function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }
  });

}
// END SCRIPT SISWA

// SCRIPT LOGIN
if (urlnow[2] == "login") {
  const form = document.getElementById('login');
  const inputs = form.querySelectorAll('input');
  const eye = form.querySelector('.eye');
  CheckValiditas(inputs);

  eye.addEventListener('click', function() {
    if (this.parentElement.querySelector('input').type == "password") {
      this.classList.replace('fa-eye-slash','fa-eye');
      this.parentElement.querySelector('input').type = "text";
    } else {
      this.classList.replace('fa-eye','fa-eye-slash');
      this.parentElement.querySelector('input').type = "password";
    }
  });

}
// END SCRIPT LOGIN

// SCRIPT REGISTER
if (urlnow[2] == "register") {
  const form = document.getElementById('register');
  const inputs = form.querySelectorAll('input');
  const eyes = form.querySelectorAll('.eye');
  CheckValiditas(inputs);

  eyes.forEach((eye) => {
    eye.addEventListener('click', function() {
      if (this.parentElement.querySelector('input').type == "password") {
        this.classList.replace('fa-eye-slash','fa-eye');
        this.parentElement.querySelector('input').type = "text";
      } else {
        this.classList.replace('fa-eye','fa-eye-slash');
        this.parentElement.querySelector('input').type = "password";
      }
    });
  });
}
// END SCRIPT REGISTER













      