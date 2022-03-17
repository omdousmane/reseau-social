// let form = document.querySelectorAll(".form-submit");
// form.forEach((element, index) => {
//   element.addEventListener("keyup", (e) => {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//       console.log(element.value.length);
//       if (xhr.readyState == 4 && xhr.status == 200) {
//         var response = xhr.response;
//         var test = document.querySelector(".list");

//         if (element.value.length !== 0) {
//           test.style.display = "block";
//           essai.innerHTML = response;
//           console.log(typeof response);
//           response = JSON.parse(response);
//           console.log(typeof response);
//           console.log(response[0].email);

//           // test.setAttribute("id", "test");
//           console.log(test);
//           for (var responsed in response) {
//             var x = document.createElement("div");
//             x.classList.add("element");
//             test.appendChild(x);
//             x.innerHTML = x.innerHTML + response[responsed].email;
//           }

//           // function search_animal() {
//           // let input = document.getElementById("recipient-speudo").value;
//           // input = input.toLowerCase();
//           x = document.getElementsByClassName("element");

//           for (i = 0; i < x.length; i++) {
//             if (!x[i].innerHTML.toLowerCase().includes(input)) {
//               x[i].style.display = "none";
//             } else {
//               x[i].style.display = "list-item";
//             }
//           }
//           // }
//         } else {
//           test.style.display = "none";
//         }
//       }
//     };
//     xhr.open("POST", "/controllers/test.php", true);
//     xhr.responseType = "text";
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.send("content=" + element.value);
//   });
// });
