var modalOpen = false;

window.onload = () => {
    var code = document.getElementById('ge-script').getAttribute('code');

    document.body.insertAdjacentHTML('beforeend', 
        `<div onclick="toggleModal();" style="position:fixed; bottom: 5px; left:2rem; border-radius: 5px; background-color: white; box-shadow: 0px 0px 20px 1px rgba(0, 0, 255, .2); padding: 2px 10px; cursor: pointer;">
            <p style="font-size: 10px; color: rgba(0,0,0, 0.8);">Carbon Neutral</p>
        </div>`
    );
    document.body.insertAdjacentHTML('beforeend', 
        `<div onclick="toggleModal();" id="ge-modal-iframe" style="display: none; transition: all; duration: 300ms; position:absolute; top: 0px; left:0px; right: 0px; bottom:0px; background-color: rgba(0,0,0, 0.8); z-index: 9999; justify-content: center; align-items: center;">
            <div style="width: 100%; max-width: 30rem; border-radius: 15px; background-color: white; padding: 0.5rem; margin: 1rem;">
                <iframe src="http://127.0.0.1:8000/embed/${code}" frameborder="0" style="max-height: 100vh; height:35rem; width:100%; border-radius: 10px;"></iframe>
            </div>
        </div>`
    );
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