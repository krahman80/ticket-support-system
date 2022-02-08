<template>
    <div>
        <p :recaptcha="recaptcha"></p>
    </div>
</template>

<script>
    export default {
        props: ['recaptcha'],
        mounted () {
            // console.log('mounted:', this.recaptcha);
            const url = this.recaptcha;
            const ReloadCaptcha = document.getElementById("reload");
            ReloadCaptcha.addEventListener("click", function() {
                // console.log(url);
                // Make the HTTP request
                let elem = document.getElementById('recaptcha');
                let xhr = new XMLHttpRequest();
                xhr.open('GET', url);
                // Track the state changes of the request.
                xhr.onreadystatechange = function () {
                    let DONE = 4;
                    let OK = 200;
                    if (xhr.readyState === DONE) {
                        if (xhr.status === OK) {
                            // console.log(xhr.responseText); // 'Result'
                            let jsonResponse = JSON.parse(xhr.responseText)
                            elem.innerHTML = jsonResponse["captcha"];
                        } else {
                            console.log('Error: ' + xhr.status); // Request error.
                        }
                    }
                };
                // Send request
                xhr.send(null);
            });

        }
    }
</script>
