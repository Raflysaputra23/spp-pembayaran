const dropdownMenu = document.querySelector('.dropdown-menu');
const btnMenu = document.querySelector('#aside a:nth-child(2)');

btnMenu.addEventListener('click', function(e) {
  e.preventDefault();
  dropdownMenu.classList.toggle('actives');

  if (dropdownMenu.classList.contains('actives')) {
      this.querySelector('.toggle').style.rotate = '0deg';
      this.querySelector('.toggle').style.transition = 'all .5s ease';
      dropdownMenu.style.height = '0px';
      dropdownMenu.style.transition = "all .5s ease";

  } else {
      let heightDropdown = dropdownMenu.scrollHeight;
      dropdownMenu.style.height = `${heightDropdown}px`;
      this.querySelector('.toggle').style.rotate = '90deg';
      this.querySelector('.toggle').style.transition = 'all .5s ease';
      dropdownMenu.style.transition = "all .5s ease";

  }
});











      function chartBar(element, data, jumlahData) {
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