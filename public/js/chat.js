/**
 * fonction de recuperation de JSON des messages a afficher
 */

function getMessages() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "/controllers/chat.php");

  xhr.onload = function () {
    // const result = xhr.responseText;
    var response = xhr.responseText;
    response = JSON.parse(response);
    // JSON.parse(result);
    // console.log(response);
    const html = response
      .reverse()
      .map(function (messages) {
        return `
             <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time">${messages.created_at.substring(
                11,
                16
              )}AM, Today</span> &nbsp; &nbsp;
              <span class="message-data-name">${
                messages.author
              }</span> <i class="fa fa-circle me"></i>

            </div>
            <div class="message other-message float-right">
              ${messages.content}
            </div>
          </li>
        `;
      })
      .join();

    const message = document.querySelector(".chat-contents");
    message.innerHTML = html;
    message.scrollTop = message.scrollHeight;
  };
  //envoie de la requete
  xhr.send();
}
// getMessages();
/**
 * fonction d'envoie de nouveau messages
 */

function postMessages(event) {
  event.preventDefault();

  const author = document.querySelector("#author");
  const content = document.querySelector("#content");

  const data = new FormData();
  data.append("author", author.value);
  data.append("content", content.value);
  // console.log(data);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/controllers/chat.php?task=write");
  xhr.onload = function () {
    content.value = "";
    content.focus();
    author.value = "";
    author.focus();
    getMessages();
  };
  xhr.send(data);
}
document.querySelector("form").addEventListener("submit", postMessages);
const intval = window.setInterval(getMessages, 3000);
getMessages();

// apparution du chat
const button = document.querySelector(".message-show");
const showChat = document.querySelector(".show-chat");
console.log(showChat);
showChat.style.display = "none";

button.addEventListener("click", () => {
  // console.log(button);
  console.log(showChat);

  if (showChat.style.display === "none") {
    showChat.style.display = "flex";
    showChat.classList.add("container-chat-message");
    // showChat.style.backgroundColor = "red";
  } else {
    showChat.style.display = "none";
    showChat.classList.remove("container-chat-message");
  }
  // document.body.style.backgroundColor = "red";
  // showChat.style.display = "block";

  // setTimeout(() => {
  //   showChat.classList.remove("container-chat-message");
  // }, 2000);
});
