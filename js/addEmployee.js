const form = document.querySelector("form");

// const employeePhotoField = document.getElementById("employeePhoto");
// const employeeCodeField = document.getElementById("employeeCode");
// const employeeNameField = document.getElementById("employeeName");
// const dateOfBirthField = document.getElementById("dateOfBirth");
// const addressField = document.getElementById("address");
// const locationField = document.getElementById("location");
// const pincodeField = document.getElementById("pincode");
// const cityField = document.getElementById("city");
// const stateField = document.getElementById("state");
// const countryField = document.getElementById("country");
const mobileNumberField = document.getElementById("mobileNumber");
const designationField = document.getElementById("designation");
const reportingManagerField = document.getElementById("reportingManager");
// const imeiField = document.getElementById("imei");
// const whatsappNumberField = document.getElementById("whatsappNumber");
// const salaryField = document.getElementById("salary");
// const dateOfJoiningField = document.getElementById("dateOfJoining");
// const addtionalDetailsField = document.getElementById("addtionalDetails");
// const AF1Field = document.getElementById("AF1");
// const AF2Field = document.getElementById("AF2");
// const AF3Field = document.getElementById("AF3");
// const AF4Field = document.getElementById("AF4");
// const AF5Field = document.getElementById("AF5");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        // console.log(true);
        submitBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/addEmployee.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Employee Created Succesfully!");
                        window.location.replace("employee.php");
                        //console.log(data);
                    }
                    else if(data == "Mobile Number already exist!"){
                        mobileNumberField.classList.add("is-invalid");
                        mobileNumberField.focus();
                        const mobileNumberFieldFeedback =  mobileNumberField.nextSibling.nextSibling;
                        mobileNumberFieldFeedback.innerHTML = "Mobile Number already exist";
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
        // console.log(formData)
        xhr.send(formData); // sending form data to php
        submitBtn.disabled = false;
    }

}

//add employee manager dropdown
designationField.onchange = ()=> {
    if(designationField.value == "SR"){
        designationDropdown = "SO";
    }
    else if(designationField.value == "SO"){
        designationDropdown = "SM";
    }
    else if(designationField.value == "SM"){
        designationDropdown = "RM";
    }
    else if(designationField.value == "RM"){
        designationDropdown = "ZM";
    }
    else if(designationField.value == "ZM"){
        designationDropdown = "Manager Sale";
    }
    else if(designationField.value == "Manager Sale"){
        designationDropdown = "none";
    }

    // console.log(designationField.value);
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/addEmployee.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data)
                reportingManagerField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("designationDropdown",designationDropdown);
    xhr.send(formData); // sending form data to php

}







