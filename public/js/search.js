const search = document.querySelector('input[placeholder="wpisz"]');
const offerContainer = document.querySelector(".offers");

search.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};


        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(response);
            return response.json();
        }).then(function (offers) {
            offerContainer.innerHTML = "";
            loadOffers(offers)
        });
    }
});

function loadOffers(offers) {
    offers.forEach(offer => {
        console.log(offer);
        if (offer.available === true) {
            createOffer(offer);
        }
    });
}

function createOffer(offer) {
    const template = document.querySelector("#offer-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = offer.id_offer;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${offer.img}`;
    const title = clone.querySelector("h1");
    title.innerHTML = offer.title;

    const animals = clone.querySelector(".fa-paw");
    const plants = clone.querySelector(".fa-seedling");
    const cleaning = clone.querySelector(".fa-broom");
    const houseCare = clone.querySelector(".fa-house-chimney-user");

    if (offer.animals === true) {
        animals.style.color="green";
    }

    if (offer.plants === true) {
        plants.style.color="green";
    }

    if (offer.cleaning === true) {
        cleaning.style.color="green";
    }

    if (offer.house_care === true) {
        houseCare.style.color="green";
    }




    offerContainer.appendChild(clone);
}