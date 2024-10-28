export default function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {
    // Memastikan input number adalah angka
    number = parseFloat(number);
  
    if (isNaN(number)) {
      return 'NaN'; // Jika bukan angka, kembalikan 'NaN'
    }
  
    // Membulatkan angka ke jumlah desimal yang diinginkan
    let fixedNumber = number.toFixed(decimals);
  
    // Memisahkan angka menjadi bagian desimal dan bagian utamanya
    let parts = fixedNumber.split('.');
    let integerPart = parts[0];
    let decimalPart = parts[1] ? dec_point + parts[1] : '';
  
    // Menambahkan pemisah ribuan
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
  
    // Menggabungkan bagian utama dan bagian desimal
    return integerPart + decimalPart;
}