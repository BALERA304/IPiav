
const hamb = document.querySelector(".hamb");
const popup = document.querySelector(".popup");
const hamb__field = document.querySelector(".hamb__field");
const menu = document.querySelector(".menu").cloneNode(1);
const body = document.body;
hamb.addEventListener("click",()=>{
   popup.classList.toggle("open");
   hamb__field.classList.toggle("active");
   body.classList.toggle("noscroll");
});

