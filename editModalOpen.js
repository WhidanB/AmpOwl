const edit = document.querySelector(".edit");
const overlay2 = document.querySelector(".overlay2");

console.log(edit);

function editModalOpen() {
  console.log(edit);
  console.log(overlay2);
  edit.classList.remove("hidden");
  edit.classList.add("affich");
  overlay2.classList.add("affich");
  overlay2.classList.remove("hidden");
}

editModalOpen();

overlay2.addEventListener("click", () => {
  overlay2.classList.add("hidden");
  overlay2.classList.remove("affich");
  edit.classList.remove("affich");
  edit.classList.add("hidden");
});
