// creation des variables globals
var currentUser = "";
var onlineUser = "";
var currentUserLastName = "";
let btns = document.querySelectorAll(".talk");
btns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    currentUser = e.target.value.substr(0, 2);
    onlineUser = e.target.value.substr(2, 4);
    currentUserLastName = e.target.value.substr(4, 14);

    // console.log(currentUser);
    console.log(currentUserLastName);

    getMessages();
  });
});

//envoie des donnée par post
let form = document.getElementById("form-chat");
form.addEventListener("submit", (e) => {
  // 1. Elle doit stoper le submit du formulaire
  e.preventDefault();

  // 2. Elle doit récupérer les données du formulaire

  var name = form.elements[0];
  var content = name.value;

  const data = {
    currentUser: currentUser,
    onlineUser: onlineUser,
    content: content,
  };
  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "/controllers/chat.php");
  requeteAjax.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  requeteAjax.onreadystatechange = function () {
    const resultat = requeteAjax.responseText;
    name.value = "";
    name.focus();
    getMessages();
  };

  requeteAjax.send(
    "currentUser=" +
      data.currentUser +
      "&onlineUser= " +
      data.onlineUser +
      "&content= " +
      data.content
  );

  const interval = window.setInterval(getMessages, 1000);
  getMessages();
});

function getMessages() {
  // 1 recuperation des données en objets data
  const data = {
    currentUser: currentUser,
    onlineUser: onlineUser,
  };

  // 1.2 Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier chat.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open(
    "GET",
    "/controllers/chat.php?currentUser=" +
      data.currentUser +
      "&onlineUser= " +
      data.onlineUser,
    true
  );

  // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
  requeteAjax.onload = function () {
    const resultat = JSON.parse(requeteAjax.responseText);
    console.log(resultat);
    const html = resultat
      .reverse()
      .map(function (messages) {
        if (messages.lastname === currentUserLastName) {
          return `
          <div class="messages">
              <div class="message-data">
                <span class="message-data-name">
                  <i class="fa fa-circle online"></i>${currentUserLastName}
                </span>
                <span class="message-data-time">${messages.created_at.substring(
                  11,
                  16
                )} AM, Today</span>
              </div>
            
               <div class="message my-message">
                 ${messages.content} 
                </div>
            </div>
          `;
        } else {
          return `
          <div class="messages">
              <div class="message-data">
                <span class="message-data-name">
                  <i class="fa fa-circle online"></i>${messages.lastname}
                </span>
                <span class="message-data-time">${messages.created_at.substring(
                  11,
                  16
                )} AM, Today</span>
              </div>
            
               <div class="message other-message">
                 ${messages.content} 
                </div>
            </div>
          `;
        }
      })
      .join("");
    const message = document.querySelector(".chat-contents");
    message.innerHTML = html;
    message.scrollTop = message.scrollHeight;
  };

  // 3. On envoie la requête
  requeteAjax.send(null);
  //   let odds = document.querySelectorAll(".chat-contents :nth-child(odd)");
  //   let evens = document.querySelectorAll(".chat-contents :nth-child(even)");
  //   // console.log(rendom);
  //   odds.forEach((odd) => {
  //     console.log("Ousmane");
  //     odd.classList.toggle("other-message");
  //   });
  //   evens.forEach((even) => {
  //     console.log("diallo");
  //     even.classList.toggle("my-message");
  //   });
}
