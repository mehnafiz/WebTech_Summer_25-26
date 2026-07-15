function validateForm() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();

    document.getElementById("nameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("messageError").textContent = "";

    let valid = true;

    if (name === "") {
        document.getElementById("nameError").textContent = "Name is required";
        valid = false;
    }


    if (
        email === "" ||
        !email.includes("@") ||
        !email.includes(".")
    ) {
        document.getElementById("emailError") = "Enter a valid email";
        valid = false;
    }

    if (message.length < 10) {
        document.getElementById("messageError").textContent = "Message must be at least 10 characters";
        valid = false;
    }

    if (valid) {
        alert("Form submitted successfully!");
    }

    return false;
}
