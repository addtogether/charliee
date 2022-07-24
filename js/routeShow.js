const form = document.querySelector("form");
const tbody = document.getElementById("routeList");
const employeeField = document.getElementById("employee");
const dayField = document.getElementById("day");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        submitBtn.disabled = true;

        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/routeShow.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    form.classList.remove("was-validated");
                    // console.log(data);
                    tbody.innerHTML = data;
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
        submitBtn.disabled = false;
    }
}

//redirect for edit page
function redirect(){
    if(employeeField.value != "" && dayField.value != ""){
        console.log(tbody.children.length);
        if(tbody.children[0].children.length != 1){
            window.location.replace("editRoute.php?id="+employeeField.value+"&d="+dayField.value);
        }
        else{
            alert("No routes to edit");
        }
    }
    else{
        alert("Please select employee and day");
    }

}