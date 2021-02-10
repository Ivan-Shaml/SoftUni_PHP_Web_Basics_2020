document.getElementById("all-users").onclick = () => {
    fetch("http://localhost/SoftUni_PHP_Web_Basics/25.%20REST%20Services%20and%20Ajax/Lectures/Half1/users")
        .then(x => x.json())
        .then(users => {
            let table = `
                <table border=1>
                    <thead>
                    <tr>
                    <th>Id</th>
                    <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
            `;

            for (let user of users) {
                table += `
                    <tr>
                        <td>${user.id}</td>
                        <td><a href="#" class="user-info" data-id="${user.id}"> ${user.username} </a> </td>
                    </tr>
                `
            }

            table += "</tbody></table>"
            document.getElementById("users").innerHTML = table;
            document.getElementById("all-users").setAttribute("style","display: none");
            document.getElementById("hide-users").setAttribute("style","display: block");

           let userInfos = document.getElementsByClassName("user-info");
           for (let userInfo of userInfos) {
               userInfo.onclick = (infoEvent) => {
                   let id = infoEvent.target.getAttribute("data-id");
                   fetch(`http://localhost/SoftUni_PHP_Web_Basics/25.%20REST%20Services%20and%20Ajax/Lectures/Half1/users/${id}`)
                       .then(x => x.json())
                       .then(userInfo => {
                           document.getElementById("users").innerHTML = `
                                <ul>
                                    <li>Id: ${userInfo.id}</li>
                                    <li>Username: ${userInfo.username}</li>
                                    <li>Password: ${userInfo.password}</li>
                                    <li>Profile Picture: ${userInfo.profile_picture_url}</li>
                                </ul>                              
                           `
                       });
               }
           }
        })
};

document.getElementById("hide-users").onclick = () =>{
    document.getElementById("users").innerHTML = '';
    document.getElementById("all-users").setAttribute("style","display: block");
    document.getElementById("hide-users").setAttribute("style","display: none");
};

document.getElementById("add-user").onclick = () => {
    document.getElementById("users").innerHTML = `
        <span id="error" style="color: red"></span> <br />
        Username: <input type='text' id="username"><br />
        Password: <input type='text' id="password"><br />
        Confirm Password: <input type='text' id="confirm"><br />
        <button type="submit" id="reg">Register!</button>
    `;

    document.getElementById("reg").onclick = () => {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let confirm = document.getElementById("confirm").value;

        if (password !== confirm) {
            document.getElementById("error").innerText = "Password mismatch";
        }else {
            fetch("http://localhost/SoftUni_PHP_Web_Basics/25.%20REST%20Services%20and%20Ajax/Lectures/Half1/users", {
                'method': 'POST',
                'body': JSON.stringify({username, password})
            }).then( () => document.getElementById("all-users").click());
        }
    };
};
