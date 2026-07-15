function toggleTheme() {
    document.body.classList.toggle("dark");

    let btn = document.getElementById("themeBtn");
    if (document.body.classList.contains("dark")) {
        btn.textContent = "Light Mode";
    } else {
        btn.textContent = "Dark Mode";
    }
}
