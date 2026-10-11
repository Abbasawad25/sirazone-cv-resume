function registerForm() {
    let fullName = document.querySelector("#full_name");
    let userName = document.querySelector("#user_name");
    let email = document.querySelector("#email");
    let phoneNumber = document.querySelector("#phone_number");
    let password = document.querySelector("#password");
    let confirmPassword = document.querySelector("#confirm_password");

    if (fullName.value === "") {
        alert("Please enter your full name");
        return false;
    }
    if (userName.value === "") {
        alert("Please enter your user name");
        return false;
    }
    if (email.value === "") {
        alert("Please enter your email");
        return false;
    }
    if (phoneNumber.value === "") {
        alert("Please enter your phone number");
        return false;
    }
    if (password.value === "") {
        alert("Please enter your password");
        return false;
    } if (confirmPassword.value === "") {
        alert("Please enter your confirm password");
        return false;
    }

    if (password.value === confirmPassword.value) {
        if (storeInLocalStorage()) {
            alert("Registered successfully");
            fullName.value = "";
            userName.value = "";
            email.value = "";
            phoneNumber.value = "";
            password.value = "";
            confirmPassword.value = "";
            return true;
        } else {
            // alert("Something went wrong!! Try again");
            return false;
        }
    } else {
        alert("Password and confirm password should be same");
        return false;
    }
}

let users = JSON.parse(localStorage.getItem("userList")) || [];
function storeInLocalStorage() {
    let user = {
        fullName: document.querySelector("#full_name").value,
        userName: document.querySelector("#user_name").value,
        email: document.querySelector("#email").value,
        phoneNumber: document.querySelector("#phone_number").value,
        password: document.querySelector("#password").value,
        confirmPassword: document.querySelector("#confirm_password").value
    }
    let userExists = users.some((obj) => {
        return obj.email === user.email;
    });

    if (userExists) {
        alert("User already exists!!")
        return false;
    } else {
        users.push(user);
        let usersInString = JSON.stringify(users);
        localStorage.setItem("userList", usersInString)
    }
    return true;
}

// storeInLocalStorage();