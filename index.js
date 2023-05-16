const add = document.querySelector(".add");
const overlay = document.querySelector(".overlay");
const modal = document.querySelector(".modal");
const suppr = document.querySelector(".suppr");
const cross = document.querySelectorAll(".cross");
const confirmDel = document.querySelector(".confirmDel");
console.log(cross);

let id = null;
function addModalOpen() {
  overlay.classList.add("affich");
  overlay.classList.remove("hidden");
  modal.classList.remove("hidden");
  modal.classList.add("affich");
}

function ModalClose() {
  console.log("click");
  overlay.classList.add("hidden");
  overlay.classList.remove("affich");
  modal.classList.remove("affich");
  modal.classList.add("hidden");
  suppr.classList.remove("affich");
  suppr.classList.add("hidden");
}
cross.forEach((opmod) =>
  opmod.addEventListener("click", () => {
    console.log("click cross");
    id = opmod.getAttribute("data-id");
    supprModalOPen();
  })
);

function supprModalOPen() {
  overlay.classList.add("affich");
  overlay.classList.remove("hidden");
  suppr.classList.remove("hidden");
  suppr.classList.add("affich");
}
function supprModalClose() {
  overlay.classList.add("hidden");
  overlay.classList.remove("affich");
  suppr.classList.remove("affich");
  suppr.classList.add("hidden");
}

function crossAttr() {
  var id = cross.getAttribute("data-id");
  confirmDel.setAttribute("data-id", id);
}

function confirmDelAttr() {
  window.location.replace("delete.php?id=" + id);
}

add.addEventListener("click", addModalOpen);

// cross.addEventListener("click", supprModalOPen);

overlay.addEventListener("click", ModalClose);

// cross.addEventListener("click", crossAttr);

confirmDel.addEventListener("click", confirmDelAttr);
