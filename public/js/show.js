let content = document.querySelector('.main-div')
let perPage = 6
let usersHTML = ''

function showUsers(users) {
    usersHTML = ''
    for (let user of users) {
        usersHTML+=`
        <div class="col">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="${user.photo}" class="img-fluid rounded-start" alt="photo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${user.name}</h5>
                                    <p class="card-text">${user.email}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    }
    content.innerHTML = `
        <div class="container">
        <div class="row row-cols-2 row-cols-lg-3">
            ${usersHTML}
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-warning w-100 show-btn">Show more</a>
            </div>
        </div>
    </div>
    `;
    let show = document.querySelector('.show-btn')
    show.onclick = function (e) {
        getUsers(perPage +=6)
        e.preventDefault()
    }
}
export default function getUsers(perPage = 6){
    fetch(`/api/users?perPage=${perPage}`)
        .then(res => res.json())
        .then(res => {
            showUsers(res)
        })
}

