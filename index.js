const add = document.querySelector(".add");
const overlay = document.querySelector(".overlay");
const modal = document.querySelector(".modal");

add.addEventListener("click", () => {
  console.log("click");
  overlay.classList.add("affich");
  overlay.classList.remove("hidden");
  modal.classList.remove("hidden");
  modal.classList.add(".affich");
});

overlay.addEventListener("click", () => {
  console.log("click");
  overlay.classList.add("hidden");
  overlay.classList.remove(".affich");
  modal.classList.remove(".affich");
  modal.classList.add(".hidden");
});
