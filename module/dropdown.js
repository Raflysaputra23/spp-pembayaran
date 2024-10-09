export default function Dropdown(box) {
  box.classList.toggle('actives');

  if (box.classList.contains('actives')) {
    box.style.display = 'block';
    box.style.height = `${box.scrollHeight}px`;
    box.style.transition = "all .3s ease";
  } else {
    box.style.height = `0px`;
    box.style.transition = "all .3s ease";
    setTimeout(() => {
      box.style.display = 'none';
    },200);
  }
}