const edit = document.querySelector(".edit");
const overlay2 = document.querySelector(".overlay2");





overlay2.addEventListener("click", () => {
  overlay2.classList.add("hidden");
  overlay2.classList.remove("affich");
  edit.classList.remove("affich");
  edit.classList.add("hidden");
});
