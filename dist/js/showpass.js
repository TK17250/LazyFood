let allpass = document.querySelectorAll(".password")

function showpassword() {

    allpass.forEach(pass => {

        if (pass.type == "password") {
            pass.type = "text"
        } else {
            pass.type = "password"
        }

    })

}