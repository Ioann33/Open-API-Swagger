import getUsers from "./show";
import getApiToken from "./auth";
let content = document.querySelector('.main-div')

export default function showCreateForm(){
    content.innerHTML = ''
    content.innerHTML = `
        <div class="alert alert-danger error-window" style="width: 500px; display: none; margin: 50px auto 0; padding: 10px"></div>
        <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0" style="margin-top: 50px">
            <div class="row bg-white shadow-sm">
                <div class="col border rounded p-4">
                    <h3 class="text-center mb-4">Create User</h3>
                    <form style="width: 500px" class="create-form">
                        <div class="form-group">
                            <label for="exampleInputUname">Name</label>
                            <input type="text" class="form-control" id="exampleInputUname" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirm">Password Confirm</label>
                            <input type="password" class="form-control" id="exampleInputConfirm" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    `;
    let form = document.querySelector('.create-form')
    form.onsubmit = function (e) {
        let token = getApiToken()
        token.then(res => {
            let formData = new FormData(form)
            fetch('/api/users', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer '+res
                }
            }).then(res => {
                if (res.status === 422 || res.status === 500 || res.status === 401){
                    res.json().then(error => {
                        let errorMess = document.querySelector('.error-window')
                        errorMess.innerText = error.message
                        errorMess.style.display = 'block'
                    })
                }else if (res.status === 204){
                    getUsers()
                }

            })
        })



        e.preventDefault()
    }

}
