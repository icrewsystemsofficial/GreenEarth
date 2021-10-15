var modalOpen = false;
var code = document.getElementById('ge-script').getAttribute('site-key');
var _verificationUrl = 'http://greenearth.test/embed/' + code;
window.onload = () => {


    document.body.insertAdjacentHTML('beforeend', `
    <!-- CSS Dynamically added by GreenEarth.js -->
    <style>
    @keyframes fadeIn {
        from { opacity: 0; }
      }

    .ge-fade {
        animation: fadeIn 3s infinite alternate;
    }

    .ge-certified {
        font-size: 11px; font-weight: bold; letter-spacing: 5px; text-align: center; color: rgba(64,64,64, 0.6);
    }

    .ge-text {
        font-size: 13px; color: rgba(0,0,0, 0.8); text-align: center;
    }

    .ge-bottom-container {
        width: 8rem; position:fixed; bottom: 0.01px; z-index: 5000; right: 0.01rem; border-top-left-radius: 2px; background-color: white; box-shadow: 0px 0px 20px 1px rgba(0, 0, 255, .2); padding: 2px 10px; cursor: pointer;
    }

    .ge-modal {
        animation: fadeIn 800ms;
        overflow-x: hidden;
        display: none; transition: all; position:fixed; top: 0px; left:0px; right: 0px; bottom:0px; background-color: rgba(0,0,0, 0.9); z-index: 9999; justify-content: center; align-items: center;
    }

    .ge-modal-container {
        width: 100%; max-width: 30rem; border-radius: 5px; background-color: white; padding: 0.5rem; margin: 1rem;
    }

    .ge-iframe {
        max-height: 100vh; height:35rem; width:100%; border-radius: 10px;
    }
    </style>`);

    document.body.insertAdjacentHTML('beforeend',
        `<div onclick="toggleModal();" class="ge-bottom-container">
            <p class="ge-text" id="_badgeText">
                Carbon Neutral
            </p>
            <p class="ge-certified">
                CERTIFIED
            </p>
        </div>`
    );
    document.body.insertAdjacentHTML('beforeend',
        `<div id="ge-modal-iframe" onclick="toggleModal();" class="ge-modal">
            <div class="ge-modal-container">
                <iframe src="${_verificationUrl}" frameborder="0" class="ge-iframe"></iframe>
            </div>
        </div>`
    );

    _changeText
    setInterval(_changeText, 6000);
}

var words = ["1.7T O<sub>2</sub> produced", "42 trees planted", "Carbon Neutral"];
var i = 0;

function _getChangedText() {
    i = (i + 1) % words.length;
    return words[i];
}

function _changeText() {
    var txt = _getChangedText();
    var d = document.getElementById("_badgeText")
    d.className = "ge-text ge-fade";
    d.innerHTML = txt;
}


function toggleModal(){
    var modal = document.getElementById('ge-modal-iframe');

    if(modalOpen){
        modal.style.display = 'none';
    }else{
        modal.style.display = 'flex';
    }

    modalOpen = !modalOpen;
}
