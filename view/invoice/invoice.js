function init() {

}

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const ventId = urlParams.get('vent_id');

    console.log(ventId);
})


init();