import getUsers from "./show";
let content = document.querySelector('.main-div')

export default function showCreateForm(){
    content.innerHTML = ''
    content.innerHTML = `
        <div class="alert-danger  error-window" style="width: 300px; display: none; margin: 50px auto 0; padding: 20px"></div>
        <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0" style="margin-top: 100px">
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
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirm">Password Confirm</label>
                            <input type="password" class="form-control" id="exampleInputConfirm" name="passConf">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    `;
    let form = document.querySelector('.create-form')
    form.onsubmit = function (e) {
        let formData = new FormData(form)
        fetch('/api/user', {
            method: 'POST',
            body: formData,
            // headers: {
            //     'Content-Type': 'multipart/form-data'
            // }
        }).then(res => res.json())
            .then(res => {
                console.log(res)
            })
        e.preventDefault()
    }

}
