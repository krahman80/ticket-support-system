<template>
</template>

<script>
    export default {
        props: ['recaptchaRoute'],
        mounted() {
            const ReloadCaptcha = document.getElementById("reload");
            ReloadCaptcha.addEventListener("click", function() {
                console.log("test click");
                
                // // Make the HTTP request
                // let elem = document.getElementById('recaptcha');
                // let xhr = new XMLHttpRequest();
                // xhr.open('GET', this.recaptchaRoute);
                // // Track the state changes of the request.
                // xhr.onreadystatechange = function () {
                //     let DONE = 4;
                //     let OK = 200;
                //     if (xhr.readyState === DONE) {
                //         if (xhr.status === OK) {
                //             // console.log(xhr.responseText); // 'Result'
                //             let jsonResponse = JSON.parse(xhr.responseText)
                //             elem.innerHTML = jsonResponse["captcha"];
                //         } else {
                //             console.log('Error: ' + xhr.status); // Request error.
                //         }
                //     }
                // };
                // // Send request
                // xhr.send(null);
                
            });
        }
    }
</script>
