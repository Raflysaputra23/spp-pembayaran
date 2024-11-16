export default function TableSiswa(response, role) {
    const tableSiswa = document.getElementById('table-siswa');
    tableSiswa.innerHTML = "";
    let no = 1;
    if(response != false) {
        response.forEach((data) => {
          tableSiswa.innerHTML += `
          <tr class="odd:bg-white even:bg-slate-50 border-y dark:bg-slate-800">
            <td class="p-2 text-center">${no++}</td>
            <td class="p-2 text-center">${data.Nisn}</td>
            <td class="p-2 text-start">${data.NamaLengkap}</td>
            <td class="p-2 text-center uppercase">${data.Jenkel[0]}</td>
            <td class="p-2 text-center">${data.Kelas}</td>
            <td class="p-2 text-center capitalize">${data.SingkatanJurusan}</td>
            <td class="p-2 flex justify-center ${role == 'user' ? "hidden" : ""}">
              <a href="" data-siswa-id="${data.SiswaID}" class="w-8 h-8 flex bg-red-500 rounded-md text-white btn-hapus"><i class="bx bx-trash m-auto"></i></a>
            </td>
          </tr>
            `;
        });
      } else {
        tableSiswa.innerHTML = `<tr><td colspan="7" class="text-center py-10 dark:text-slate-200">Data tidak ditemukan</td></tr>`;
      }
}