function updateGreeting() {
    let hour = new Date().getHours();
    let text = "";

    if (hour < 12) {
        text = "Good Morning";
    } else if (hour < 18) {
        text = "Good Afternoon";
    } else {
        text = "Good Evening";
    }

    document.getElementById("greeting").textContent = text + "!";
}

function updateClock() {
    let now = new Date();
    document.getElementById("clock").textContent = now.toLocaleTimeString();
}

function startClock() {
    updateGreeting();
    updateClock();
    setInterval(updateClock, 1000);
}
