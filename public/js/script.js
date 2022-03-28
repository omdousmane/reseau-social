/* Sélection des éléments HTML */
let link = document.getElementById("link");
let burger = document.getElementById("burger");
let ul = document.querySelector(".list-unstyled");

/* gestionnaire d'événement sur le a#link pour venir changer l'attribution de la classe .open à la ul et au span#burger */
link.addEventListener("click", function (e) {
  e.preventDefault();
  burger.classList.toggle("open");
  ul.classList.toggle("open");
});

// affichage des messages
const button = document.querySelector(".message-show");
const showChat = document.querySelector(".show-chat");
showChat.style.display = "none";

button.addEventListener("click", () => {
  // getMessages();

  if (showChat.style.display === "none") {
    showChat.style.display = "flex";
    showChat.classList.add("container-chat-message");
  } else {
    showChat.style.display = "none";
    showChat.classList.remove("container-chat-message");
  }
});
