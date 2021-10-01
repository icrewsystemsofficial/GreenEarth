let span = document.querySelector("[data-api-id]");

let btn = document.getElementById('geBtn');
let modal = document.getElementById('geModal');
let modalClose = document.getElementsByClassName("close")[0];

let iframe = document.getElementById('geIframe');
let spanId = span.dataset.apiId;

//
// window.onload = function () {
//     axios.get('api/v1/badge/'+ spanId)
//         .then(function (response) {
//             console.log(response)
//         }).catch(function (error) {
//         console.log(error);
//     });
// }

btn.onclick = function () {
    modal.style.display = 'block';
}

modalClose.onclick = function() {
    modal.style.display = "none";
}


// window.onload = function () {
//     axios.get('')
// }
//
// openModal();



















//
// let btn = document.createElement("button");





// let iframe = document.createElement('iframe');
//
// btn.innerHTML = "Carbon neutral ";
// btn.className = 'ge_btn';
//
// iframe.id = 'ge_iframe';
// iframe.src = 'api/test';
//
//
// btn.onclick = function () {
//     iframe.style.display = 'block';
//     document.body.appendChild(iframe);
// };
// document.body.appendChild(btn);
//
// head.appendChild(link);
//
//
// //
// // $(document).ready(function () {
// //     $('#container').append('<button class="btn-styled" style="position: fixed;right: 1rem;bottom: 1rem;color: white; background: linear-gradient(135deg, rgb(58, 165, 96), rgb(183, 230, 108)); box-shadow: rgba(58, 165, 96, 0.5) 0px 2px 16px;;padding: 5px 10px;border-radius: 10px;transform: translateY(0px);transition: none 0s ease 0s !important;" type="button">Carbon Neutral</button>');
// // });