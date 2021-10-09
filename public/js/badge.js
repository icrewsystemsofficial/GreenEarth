let span = document.querySelector("[data-api-id]");
let apikey = span.dataset.apiId;

console.log(apikey);
let iframeWrapper = document.getElementById('iframe_wrapper');
let src = 'https://wip.icrewsystems.com/'

$(document).ready(function () {
    $('#ge_btn').on('click', function () {
        $('#ge_modal').css('display', 'block');

        $('<iframe class="ge_iframe" id="ge_modal_iframe">')                      // Creates the element
            .attr('src',src) // Sets the attribute spry:region="myDs"
            .appendTo('#iframe_wrapper')

        $('#ge_modal_iframe').on('load',function () {
            $('#ge_iframe_loader').hide()
        })

    });


    $('.ge_modal_close').on('click', function () {
        $('#ge_modal').css('display', 'none');
        $('#ge_modal_iframe').remove()
    })

    let timeout = 5 * 90 * 1000 // 15mins

    setInterval(function () {
        axios.get('analytics/business/'+ apikey)
            .then(function (response) {
               console.log(response)
            }).catch(function (error) {
                console.log(error)
        })
    },timeout)

})
