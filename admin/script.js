function rows(myJson){
    myJson.forEach(element => {
        let template = document.querySelector("#productrow");
        let tbody = document.querySelector("tbody");
        let clone = document.importNode(template.content, true);
        let td = clone.querySelectorAll("td");
        td[0].textContent = element['Mail'];
        td[1].textContent = element['Date'];
        td[2].setAttribute("data-value",element['ID']);
        tbody.append(clone);

    })
    const deleteButton = document.querySelectorAll("img");
    deleteButton.forEach(element => {
        element.addEventListener('click', function (e) {
            const confirmation = document.querySelector(".confirm-flex");
            const yes = document.querySelector(".yes");
            const no = document.querySelector(".no");
            confirmation.classList.add("hidden")
            yes.addEventListener("click", function () {
                const email = element.parentElement.parentElement.parentElement
                email.remove();
                let data = new FormData();
                data.append("delete", element.parentElement.parentElement.dataset.value);
                fetch("delete.php",{
                    method: 'POST',
                    body: data
                })
                confirmation.classList.remove("hidden");
            })
            no.addEventListener("click", function(b) {
                confirmation.classList.remove("hidden");
            })
        })
    });
}

searchInput = document.querySelector(".search")

let number = new FormData();
number.append("morecycle",0);

fetch('getdb.php',{
    method: 'POST',
    body: number })
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            rows(myJson)
        })
const showMore = document.querySelector(".voir_plus");
showMore.addEventListener("click", function(){
    let limit = document.querySelectorAll('tbody tr').length
    let data = new FormData();
    data.append("limit", limit);
    data.append("search", searchInput.value)
    fetch("getdb.php",{
        method: 'POST',
        body: data
    }).then(function (response) {
        return response.json();
    })
        .then(function (myJson) {
            console.log(myJson)
            if (myJson.length < 10){
                console.log("true")
                showMore.classList.remove("displayvisible")
            }else {
                showMore.classList.add("displayvisible")
                console.log("false")

            }
            rows(myJson)


})})



searchInput.addEventListener("keyup", function (e) {
    if (this.value == ""){
        showMore.classList.add("displayvisible")

    }else
    {
        showMore.classList.remove("displayvisible")
    }
    console.log(e.key)
    if (e.key != "Enter" && e.key != "AltGraph" && e.key != "Control") {
        let tbody = document.querySelector("tbody");
        tbody.querySelectorAll('tr').forEach(function (element) {
            element.remove()
        })
        if (tbody.children.length == 0) {
        let searchForm = new FormData();
        searchForm.append("entries", this.value);

        fetch('search.php', {
            method: 'POST',
            body: searchForm
        })
            .then(function (response) {
                return response.json();
            }).then(function (myJson) {
            rows(myJson)
        })
    }}
})
fetch('showmorevisible.php', {
}).then(function (response) {
    return response.json();
    }).then(function (json) {
    if (json.length > 10) {
        showMore.classList.add('displayvisible');
    }
})