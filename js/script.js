import Dropdownbox from "http://localhost/spp-pembayaran/js/module/Dropdown.js";
import CheckValiditas from "http://localhost/spp-pembayaran/js/module/CheckValiditas.js";
import NumberFormat from "http://localhost/spp-pembayaran/js/module/NumberFormat.js";
import ModalBox from "http://localhost/spp-pembayaran/js/module/ModalBox.js";
import TableSiswa from "http://localhost/spp-pembayaran/js/module/TableSiswa.js";
import PlateCardSiswa from "http://localhost/spp-pembayaran/js/module/PlateCardSiswa.js";
import PlateCardHistory from "http://localhost/spp-pembayaran/js/module/PlateCardHistory.js";
import { SwetAlertInfo, SwetAlertConfirm } from "http://localhost/spp-pembayaran/js/module/SwetAlertMixin.js";
import { aside, pathUrl, btnSetting, btnModalBox, btnMode, html } from "http://localhost/spp-pembayaran/js/module/tags.js";
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

if(localStorage.getItem('Mode') == 'dark') {
    btnMode.classList.replace('light','dark');
    btnMode.querySelector('.bxs-moon').classList.replace('-translate-y-8','-translate-y-0');
    btnMode.querySelector('.bxs-sun').classList.replace('-translate-y-8','-translate-y-0');
} else {
    btnMode.classList.replace('dark','light');
    btnMode.querySelector('.bxs-moon').classList.replace('-translate-y-0','-translate-y-8');
    btnMode.querySelector('.bxs-sun').classList.replace('-translate-y-0','-translate-y-8');
}

btnMode.addEventListener('click', function() {
  if(this.classList.contains('light')) {
    this.classList.replace('light','dark');
    this.querySelector('.bxs-moon').classList.replace('-translate-y-8','-translate-y-0');
    this.querySelector('.bxs-sun').classList.replace('-translate-y-8','-translate-y-0');
    localStorage.setItem('Mode', 'dark');
    html.classList.add('dark');
  } else {
    this.classList.replace('dark','light');
    this.querySelector('.bxs-moon').classList.replace('-translate-y-0','-translate-y-8');
    this.querySelector('.bxs-sun').classList.replace('-translate-y-0','-translate-y-8');
    html.classList.remove('dark');
    localStorage.setItem('Mode', 'light');
  }
});
// END SCRIPT MAIN

// SCRIPT DASHBOARD

// END SCRIPT DASHBOARD

// SCRIPT KELAS
if (urlnow[2] == "kelas") {
  const chartKelas = document.getElementById('chartKelas');
  document.addEventListener('DOMContentLoaded', async (e) => {
    let response = await fetch(`${dirname}kelas/getDataJurusan`);
    response = await response.json();
    ChartBar(chartKelas, response.map((item) => item.SingkatanJurusan), response.map((item) => item.TotalSiswa),'Jurusan');
  });

  const formJurusan = document.getElementById('form-jurusan');
  const btnJurusan = document.getElementById('btn-jurusan');

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
  const btnHapus = document.querySelectorAll('.btn-hapus');

  btnDropdownShow.addEventListener('click', function() {
   Dropdownbox(this.nextElementSibling);
  });

  boxDropdownShow.querySelectorAll('a').forEach((a) => {
    a.addEventListener('click', async function(e) {
      e.preventDefault();
        let data = this.dataset.sort; 
        let role = this.dataset.role;
        let response = await fetch(`${dirname}siswa/getDataSort`, { method: "POST", body: JSON.stringify({data})});
        response = await response.json();
        TableSiswa(response, role);
    });
  });



  btnSortId.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    let role = this.dataset.role;
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
    TableSiswa(response, role);
  });

  btnSortNisn.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    let role = this.dataset.role;

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
    TableSiswa(response, role);
  });

  btnSortUsername.addEventListener('click', async function(e) {
    e.preventDefault();
    let dataSort = this.dataset.sort;
    let dataColumn = this.dataset.column;
    let role = this.dataset.role;
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
    TableSiswa(response, role);
  });

  formSearchSiswa.addEventListener('submit', async function(e) {
    e.preventDefault();
    const data = new FormData(this);
    let role = this.dataset.role;
    let response = await fetch(`${dirname}siswa/searchData`, { method: "POST", body: data});
    response = await response.json();
    TableSiswa(response, role);
  });

  btnHapus.forEach((btn) => {
    btn.addEventListener('click', async function(e) {
      e.preventDefault();

      let response = await SwetAlertConfirm('warning','Yakin ingin menghapus siswa ini?','Ya, Hapus!');
      if(response.isConfirmed) {
        let response = await fetch(`${dirname}siswa/hapusSiswa`, { method: "POST", body: JSON.stringify({SiswaID: this.dataset.siswaId})});
        response = await response.json();
        if(response) {
          SwetAlertInfo('success','Siswa Berhasil','<span class="text-green-500 poppins">Berhasil</span>');
          setTimeout(() => {window.location.reload()}, 2000);
        } else {
          SwetAlertInfo('error','Siswa Gagal Dihapus','<span class="text-red-500 poppins">Gagal</span>');
          setTimeout(() => {window.location.reload()}, 2000);
        }
      }
    });
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
  // const inputs = document.querySelectorAll('input');
  const formSpp = document.getElementById('form-spp');
  const btnSpp = document.getElementById('btn-spp');
  const inputSpp = document.querySelectorAll('input[name="pilihan[]"]');
  const formSearch = document.getElementById('form-search');

  let totalHarga = 0;
  inputSpp.forEach((input) => {
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


  const data = { BulanID: 0, TotalHarga: 0, Bulan: [], NamaLengkap: '', Email: '', Phone: 0,};
  if(btnSpp != null) {
    btnSpp.addEventListener('click', async function(e) {
      e.preventDefault();
      inputSpp.forEach((input) => {
        if(input.checked) {
          data.TotalHarga += parseInt(input.dataset.harga);
          data.SiswaID = input.dataset.siswaId;
          data.Bulan.push({
            id: input.dataset.bulanId,
            price: parseInt(input.dataset.harga),
            quantity: 1,
            name: input.value,
          });
          data.NamaLengkap = input.dataset.nama;
          data.Email = input.dataset.email;
          data.Phone = input.dataset.notelp;
        }
      });

      if(!data.Email || !data.Phone) {
        SwetAlertInfo ('warning','Anda belum mengisi email dan nomor telepon','Peringatan!');
      } else {
        let token = await fetch(`${dirname}vendor/midtrans.php`, { method: "POST", body: JSON.stringify(data)});
        token = await token.json();
        window.snap.pay(token, {
          onSuccess: async function(result){
            data.TranksaksiID = result.order_id;
            data.MetodePay = result.payment_type;
            data.CreateAt = result.transaction_time;
            fetch(`${dirname}spp/setTranksaksi`, { method: "POST", body: JSON.stringify(data)});
            window.location.reload();
          },
          onPending: function(result){
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            alert("payment failed!"); 
            console.log(result);
          },
          onClose: function(){
            alert('you closed the popup without finishing the payment');
          }
        });
      }
    });
  }

  if(formSearch != null) {
    formSearch.addEventListener('submit', async function(e) {
      e.preventDefault();
      const data = new FormData(this);
      let response = await fetch(`${dirname}spp/getRekapSiswa`, { method: 'POST', body: data });
      response = await response.json();
      PlateCardSiswa(response, dirname);
    });
  }

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

// START SCRIPT HISTORY
if(urlnow[2] == "history") {
  const btnSort = document.getElementById("btn-sort");
  btnSort.addEventListener("click", async function(e) {
    e.preventDefault();
    this.dataset.sort = (this.dataset.sort == "ASC") ? "DESC" : "ASC";
    let data = { Order: this.dataset.sort, SiswaID: this.dataset.siswaId }
    this.querySelector("i").classList.replace((data == "ASC") ? "rotate-0" : "rotate-180", (data == "DESC") ? "rotate-0" : "rotate-180");
    let response = await fetch(`${dirname}history/getDataOrder`, { method: "POST", body: JSON.stringify(data)});
    response = await response.json();
    PlateCardHistory(response, dirname);
  })
};
// END SCRIPT HISTORY

// START SCRIPT TRANKSAKSI
if(urlnow[2] == "tranksaksi") {
  const formSearch = document.getElementById("form-search");
  formSearch.addEventListener("submit", async function(e) {
    e.preventDefault();
    const data = new FormData(this);
    let response = await fetch(`${dirname}tranksaksi/getHistory`, { method: "POST", body: data });
    response = await response.json();
    PlateCardHistory(response, dirname);
  });
}
// END SCRIPT TRANKSAKSI













      