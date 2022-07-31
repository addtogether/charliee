const form = document.querySelector("form");
submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        // console.log(true);
        submitBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/login.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        location.href = "dashboard.php";
                    }
                    else{
                        alert("Something Went Wrong!");
                        console.log(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
    }
}