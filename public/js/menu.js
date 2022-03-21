/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
function myFunction2() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

// GESTION APPARUTION ET DISPARUTION DU CHAT

let chat = document.querySelector(".container-chat-message");
let chatContent = document.querySelector("#show-chat");
// console.log(chatContent);
btnSshowMessage = document.querySelector(".message-show");

// btnSshowMessage.addEventListener("click", () => {
//   if (chat.classList.contains("container-chat-message")) {
//     chat.classList.toggle("container-chat-message");
//   }
// });

// btnSshowMessage.addEventListener("click", () => {
//   if ((chatContent.classList.contains = "container-chat")) {
//     chatContent.classList.toggle = "container-chat";
//     console.log(chatContent);
//     // console.log("chatContent");
//   }
//   // else {
//   //   chat.display = "block";
//   // }
// });
