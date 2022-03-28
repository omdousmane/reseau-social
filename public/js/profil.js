let post = document.querySelector(".form-floating");
let content = document.querySelector(".content-text");
let label = document.querySelector(".label");
let commenToggles = document.querySelectorAll(".comment-toggle");
let formComment = document.querySelectorAll(".form-comment");
// console.log(formComment);
let topbar = document.querySelector(".topbar");
let select = document.querySelector(".form-select");
let selectInput = document.querySelector(".form-input");
let formSubmit = document.querySelector(".form-submit");

post.addEventListener("keyup", () => {
  console.log("diallo");
  post.classList.remove("col-8");
  post.classList.add("col-6");
  selectInput.style.display = "block";
  label.style.display = "none";

  if (content.value === "") {
    label.style.display = "block";
    selectInput.style.display = "none";
    formSubmit.style.display = "none";
  }
});

selectInput.addEventListener("keyup", () => {
  formSubmit.style.display = "block";
});

formComment.forEach((element) => {
  element.style.display = "none";
});
/// pour les commentaires
commenToggles.forEach((commenToggle) => {
  commenToggle.addEventListener("click", (e) => {
    let formComent =
      e.target.parentNode.parentNode.nextSibling.nextElementSibling;
    // console.log(essai);

    if (formComent.style.display === "none") {
      formComent.style.display = "block";
    } else {
      formComent.style.display = "none";
    }
  });

  // if (formComment.value === "") {
  //   formComment.style.display = "block";
  // }
});
