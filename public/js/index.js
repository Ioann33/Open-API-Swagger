import showCreateForm from "./create";
import getUsers from "./show";
let createBtn = document.querySelector('.create-btn')
let startBtn = document.querySelector('.start-btn')

startBtn.onclick = function (e) {
    getUsers()
    e.preventDefault()
}

createBtn.onclick = function (e) {
    showCreateForm()
    e.preventDefault()
}


getUsers()
