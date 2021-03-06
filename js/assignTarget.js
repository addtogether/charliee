const form = document.querySelector("form");
const employee = document.getElementById("employee");
const tbody = document.getElementById("assignTargetList");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        submitBtn.disabled = true;

        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/assignTarget.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                      alert("Target Assigned Succesfully!");
                      window.location.replace("assignTarget.php");
                      //console.log(data);
                    }
                    else if(data == "Employee's Target already exist!"){
                        alert(data);
                        //console.log(data);
                    }
                    else{
                        alert("Something went wrong!");
                        // console.log(data);
                        // alert(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
        submitBtn.disabled = false;
    }
}

//assignTargetList
employee.onchange = ()=> {

    // console.log(designationField.value);
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/assignTarget.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data)
                tbody.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("assignTargetList", employee.value);
    xhr.send(formData); // sending form data to php
}