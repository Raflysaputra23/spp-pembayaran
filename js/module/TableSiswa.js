export default function TableSiswa(response) {
    const tableSiswa = document.getElementById('table-siswa');
    tableSiswa.innerHTML = "";
    let no = 1;
    if(response != false) {
        response.forEach((data) => {
          tableSiswa.innerHTML += `
          <tr class="odd:bg-white even:bg-slate-50 border-y">
            <td class="p-2 text-center">${no++}</td>
            <td class="p-2 text-center">${data.Nisn}</td>
            <td class="p-2 text-start">${data.NamaLengkap}</td>
            <td class="p-2 text-center uppercase">${data.Jenkel[0]}</td>
            <td class="p-2 text-center">${data.Kelas}</td>
            <td class="p-2 text-center capitalize">${data.NamaJurusan}</td>
            <td class="p-2 flex justify-center">
              <a href="" data-siswa-id="${data.SiswaID}" class="w-8 h-8 flex bg-red-500 rounded-md text-white"><i class="bx bx-trash m-auto"></i></a>
            </td>
          </tr>
            `;
        });
      } else {
        tableSiswa.innerHTML = `<tr><td colspan="7" class="text-center py-10">Data tidak ditemukan</td></tr>`;
      }
}