export default function ModalBox(btnModalBox) {
    btnModalBox.forEach((btn) => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          let modalBoxStatic = this.nextElementSibling;
          let modalBox = modalBoxStatic.firstElementChild;
          let btnCloseBox = modalBox.querySelector('[data-close-box="modalBox"]');

          modalBoxStatic.classList.add('fixed','inset-0');
          modalBoxStatic.style.backgroundColor = "rgba(0,0,0,.4)";
          modalBoxStatic.classList.add('z-3');
          modalBoxStatic.classList.remove("hidden");
          modalBox.classList.add('bg-white','rounded-md','p-4','absolute','top-9','z-10','start-1/2','-translate-x-1/2');
          modalBox.style.width = `90%`;
          modalBox.style.maxWidth = `${modalBox.dataset.modalSize}px`;
               
          btnCloseBox.addEventListener('click', function(e) {
              modalBoxStatic.classList.add('hidden');
          });

        });
    });
    
}