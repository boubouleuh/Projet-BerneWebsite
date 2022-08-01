const confirmation = document.querySelector(".confirm-flex");
confirmation.style.display = "none";
setTimeout(() => {
    confirmation.style.display = "flex";
}, "100")

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
            confirmation.classList.add("hidden");
            yes.addEventListener("click", function () {
                const email = element.parentElement.parentElement.parentElement
                email.remove();
                let data = new FormData();
                data.append("delete", element.parentElement.parentElement.dataset.value);
                fetch("delete.php",{
                    method: 'POST',
                    body: data
                }).then(function (response){
                    length -= 1;
                    compteurNow.textContent = length;
                    compteurTotal.textContent = compteurTotal.textContent - 1;


                })
                confirmation.classList.remove("hidden");
            })
            no.addEventListener("click", function(b) {
                confirmation.classList.remove("hidden");
            })
        })
    });
}
const compteurNow = document.querySelector('.compteur-now')
const compteurTotal = document.querySelector('.compteur-total')
fetch('count.php',{
    method: 'POST'
})
    .then(function (response) {
        return response.json();
    })
    .then(function (myJson) {
        compteurTotal.textContent = myJson[0][0]

    })



searchInput = document.querySelector(".search")
fetch('getdb.php',{
    method: 'POST'})
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            length = myJson.length
            compteurNow.textContent = length
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
            length += myJson.length
            compteurNow.textContent = length
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
    let tbody = document.querySelector("tbody");
    if (this.value == ""){
        if (e.key != "Enter" && e.key != "AltGraph" && e.key != "Control" && e.key != "Alt" ) {
            tbody.querySelectorAll('tr').forEach(function (element) {
                element.remove()
            })

            fetch('getdb.php', {
                method: 'POST'
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    length = myJson.length
                    compteurNow.textContent = length
                    rows(myJson)
                    showMore.classList.add("displayvisible")
                })
            fetch('count.php', {
                method: 'POST'
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    compteurTotal.textContent = myJson[0][0]

                })
            return false;


        }
    }else
    {
        showMore.classList.remove("displayvisible")
    }
    console.log(e.key)
    if (e.key != "Enter" && e.key != "AltGraph" && e.key != "Control" && e.key != "Alt" ) {
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
            console.log(myJson)
            compteurNow.textContent = myJson.length;
            compteurTotal.textContent = myJson.length;
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