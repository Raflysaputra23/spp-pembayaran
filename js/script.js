import Dropdownbox from "http://localhost/spp-pembayaran/js/module/Dropdown.js";
import CheckValiditas from "http://localhost/spp-pembayaran/js/module/CheckValiditas.js";
import NumberFormat from "http://localhost/spp-pembayaran/js/module/NumberFormat.js";
import ModalBox from "http://localhost/spp-pembayaran/js/module/ModalBox.js";
import TableSiswa from "http://localhost/spp-pembayaran/js/module/TableSiswa.js";
import SwetAlertMixin from "http://localhost/spp-pembayaran/js/module/SwetAlertMixin.js";
import { aside, pathUrl, btnSetting, btnModalBox} from "http://localhost/spp-pembayaran/js/module/tags.js";
import { ChartBar } from "http://localhost/spp-pembayaran/js/module/Chart.js";

const dirname = "http://localhost/spp-pembayaran/";
const urlnow = window.location.pathname.split('/');
if(btnModalBox) {
  ModalBox(btnModalBox);
}


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
  // const formKelas = document.getElementById('form-kelas');
  const btnJurusan = document.getElementById('btn-jurusan');
  // const btnKelas = document.getElementById('btn-kelas');


  // btnKelas.addEventListener('click', function(element) {
  //   element.preventDefault();
  //   Dropdownbox(formKelas)
  // });
  if(btnJurusan) {
    btnJurusan.addEventListener('click', function(element) {
       element.preventDefault();  
       Dropdownbox(formJurusan);
    });
  }
}
// END SCRIPT KELAS

// SCRIPT SISWA
if (urlnow[2] == "siswa") {
  const btnDropdownShow = document.getElementById('btn-dropdown-show');
  const boxDropdownShow = document.getElementById('box-dropdown-show');
  const btnSortId = document.getElementById('btn-sort-id');
  const btnSortNisn = document.getElementById('btn-sort-nisn');
  const btnSortUsername = document.getElementById('btn-sort-username');
  const formSearchSiswa = document.getElementById('form-search-siswa');

  btnDropdownShow.addEventListener('click', function() {
   Dropdownbox(this.nextElementSibling);
  });

  boxDropdownShow.querySelectorAll('a').forEach((a) => {
    a.addEventListener('click', async function(e) {
      e.preventDefault();
        let data = this.dataset.sort; 
        let response = await fetch(`${dirname}siswa/getDataSort`, { method: "POST", body: JSON.stringify({data})});
        response = await response.json();
        TableSiswa(response);
    });
  });



  btnSortId.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }

    let $data = { order: dataSort, column: dataColumn };
    let response = await fetch(`${dirname}siswa/getDataOrder`, { method: "POST", body: JSON.stringify($data)});
    response = await response.json();
    TableSiswa(response);
  });

  btnSortNisn.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }

    let $data = { order: dataSort, column: dataColumn };
    let response = await fetch(`${dirname}siswa/getDataOrder`, { method: "POST", body: JSON.stringify($data)});
    response = await response.json();
    TableSiswa(response);
  });

  btnSortUsername.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    if(dataSort == "ASC") {
      this.querySelector('i').classList.replace('rotate-0','rotate-180');
      this.dataset.sort = "DESC";
    } else {
      this.querySelector('i').classList.replace('rotate-180','rotate-0');
      this.dataset.sort = "ASC";
    }

    let $data = { order: dataSort, column: dataColumn };
    let response = await fetch(`${dirname}siswa/getDataOrder`, { method: "POST", body: JSON.stringify($data)});
    response = await response.json();
    TableSiswa(response);
  });

  formSearchSiswa.addEventListener('submit', async function(e) {
    e.preventDefault();
    const data = new FormData(this);
    let response = await fetch(`${dirname}siswa/searchData`, { method: "POST", body: data});
    response = await response.json();
    TableSiswa(response);
  });

}
// END SCRIPT SISWA

// SCRIPT LOGIN
if (urlnow[2] == "login") {
  const form = document.getElementById('User-form');
  const inputs = document.querySelectorAll('input');
  const eyes = document.querySelectorAll('.eye');
  const toggleForm = document.getElementById('toggle-form');
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

  toggleForm.addEventListener('click', (e) => {
    if(e.target.id == "btn-user") {
      document.getElementById("User-form").classList.remove("hidden");
      document.getElementById("Admin-form").classList.add("hidden");
      e.target.classList.replace("btn-outline-primary","btn-primary");
      e.target.nextElementSibling.classList.replace("btn-primary","btn-outline-primary");
    } else if(e.target.id == "btn-admin"){
      document.getElementById("Admin-form").classList.remove("hidden");
      document.getElementById("User-form").classList.add("hidden");
      e.target.classList.replace("btn-outline-primary","btn-primary");
      e.target.previousElementSibling.classList.replace("btn-primary","btn-outline-primary");
    }
  }); 

}
// END SCRIPT LOGIN

// SCRIPT REGISTER
if (urlnow[2] == "register") {
  const form = document.getElementById('Manual-form');
  const inputs = document.querySelectorAll('input');
  const eyes = document.querySelectorAll('.eye');
  const toggleForm = document.getElementById('toggle-form');
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

  toggleForm.addEventListener('click', (e) => {
    if(e.target.id == "btn-manual") {
      document.getElementById('Manual-form').classList.remove('hidden');
      document.getElementById('Otomatis-form').classList.add('hidden');
      document.getElementById('Admin-form').classList.add('hidden');
      e.target.classList.replace('btn-outline-primary','btn-primary');
      e.target.nextElementSibling.classList.replace('btn-primary','btn-outline-primary');
      e.target.nextElementSibling.nextElementSibling.classList.replace('btn-primary','btn-outline-primary');
    } else if(e.target.id == "btn-otomatis") {
      document.getElementById('Otomatis-form').classList.remove('hidden');
      document.getElementById('Manual-form').classList.add('hidden');
      document.getElementById('Admin-form').classList.add('hidden');
      e.target.classList.replace('btn-outline-primary','btn-primary');
      e.target.previousElementSibling.classList.replace('btn-primary','btn-outline-primary');
      e.target.nextElementSibling.classList.replace('btn-primary','btn-outline-primary');
    } else if(e.target.id == "btn-admin") {
      document.getElementById('Admin-form').classList.remove('hidden');
      document.getElementById('Manual-form').classList.add('hidden');
      document.getElementById('Otomatis-form').classList.add('hidden');
      e.target.classList.replace('btn-outline-primary','btn-primary');
      e.target.previousElementSibling.classList.replace('btn-primary','btn-outline-primary');
      e.target.previousElementSibling.previousElementSibling.classList.replace('btn-primary','btn-outline-primary');
    }

  });


}
// END SCRIPT REGISTER

// SCRIPT SPP
if(urlnow[2] == "spp") {
  const inputs = document.querySelectorAll('input');
  const formSpp = document.getElementById('form-spp');
  const btnSpp = document.getElementById('btn-spp');
  let totalHarga = 0;
  inputs.forEach((input) => {
    input.addEventListener('change', function() {
      if(this.checked) {
        totalHarga += parseInt(this.dataset.harga);
        document.getElementById('total-harga').innerHTML = `Rp. ${NumberFormat(totalHarga,0,'.','.')}`;
        if(totalHarga != 0) {
          document.getElementById('total-harga').nextElementSibling.removeAttribute('disabled','true');
          document.getElementById('total-harga').nextElementSibling.classList.remove('disabled');
        }
      } else {
        totalHarga -= parseInt(this.dataset.harga);
        document.getElementById('total-harga').innerHTML = `Rp. ${NumberFormat(totalHarga,0,'.','.')}`;
        if(totalHarga == 0) {
          document.getElementById('total-harga').nextElementSibling.setAttribute('disabled','true');
          document.getElementById('total-harga').nextElementSibling.classList.add('disabled');
        } 
      }
    });
  });

  btnSpp.addEventListener('click', async function(e) {
    e.preventDefault();
    const data = new FormData(formSpp);
    let response = await fetch(`${dirname}spp/buySpp`, { method: "POST", body: data});
    response = await response.json();
    if(response) {
      SwetAlertMixin('success','Pembayaran SPP berhasil','<span class="text-green-500 poppins">Berhasil</span>');
      setTimeout(() => {window.location.reload()}, 2000);
    } else {
      SwetAlertMixin('error','Pembayaran SPP gagal','<span class="text-red-500 poppins">Berhasil</span>');
      setTimeout(() => {window.location.reload()}, 2000);
    }
  });
}
// END SCRIPT SPP

// SCRIPT PROFIL
if(urlnow[2] == "profil") {
  const uploadFoto = document.getElementById("upload-foto");
  const plateFoto = document.getElementById("plate-foto");
  const formUbahPassword = document.getElementById("form-ubah-password");
  const alert = document.getElementById("alert");

  // UPLOAD GAMBAR
  uploadFoto.addEventListener('change', function() {
    let fileFoto = this.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
      if(this.readyState == 2) plateFoto.src = this.result;
    }
    reader.readAsDataURL(fileFoto);
  });

  formUbahPassword.addEventListener("submit", async function(e) {
    e.preventDefault();
    const data = new FormData(this);
    alert.innerHTML = `<i class="bx bx-loader-alt text-2xl animate-spin"></i>`;

    let response = await fetch(`${dirname}profil/getPassword`, { method: "POST", body: data });
    response = await response.json();
    if(response.status == "error") {
      alert.innerHTML = `<span class="text-red-500 flex items-center">${response.pesan} <i class="bx bx-x text-md"></i></span>`;
      setTimeout(() => { window.location.reload() },1000);
    } else {
      alert.innerHTML = `<span class="text-green-500 flex items-center">${response.pesan} <i class="bx bx-check text-md"></i></span>`;
      setTimeout(() => { window.location.reload() },1000);
    } 
  });
}
// END SCRIPT PROFIL













      