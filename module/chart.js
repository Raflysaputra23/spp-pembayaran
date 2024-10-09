export function chartBar(element, data, jumlahData) {
  new Chart(element, {
  type: 'bar',
    data: {
      labels: data,
       datasets: [{
         label: 'Jurusan',
         data: jumlahData,
        borderWidth: 1,
        backgroundColor: ['blue']
      }]  
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}