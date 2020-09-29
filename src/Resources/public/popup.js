document.addEventListener("DOMContentLoaded", function () {
    // Facebook und Twitter Popup

    var popUpElem = document.querySelectorAll('.sharePopup');

    for (var i = 0; i < popUpElem.length; i++) {
        popUpElem[i].onclick = function(event) {
            event.preventDefault();
            var width,
                height;
            if (this.classList.contains("share")) {
                width = 550;
                height = 450;
            } else if (this.classList.contains("sm_facebook")) {
                width = 600;
                height = 700;
            }
            var left = (window.innerWidth - width) / 2,
                top = (window.innerHeight - height) / 2,
                url = this.href,
                opts = 'status=1' +
                    ',width=' + width +
                    ',height=' + height +
                    ',top=' + top +
                    ',left=' + left;

            var mypopup = window.open(url, 'share_popup', opts);
            if (mypopup) mypopup.focus();
        }
    }
});