const form = document.querySelector('form');
form.addEventListener("submit", function(e) {
    e.preventDefault();
    const data = new FormData(form);
    fetch("login.php", {
        method: "POST",
        body: data
    }).then(function(response) {
        return response.text();
    }).then(function(text) {
        if(text == "ok"){
            location.href = "/admin";
    }}).catch(function(error) {
        console.error(error);
    });
});