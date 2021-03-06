const form = document.querySelector("form");

// const retailerCodeField = document.getElementById("retailerCode");
// const retailerNameField = document.getElementById("retailerName");
// const contactPersonNameField = document.getElementById("contactPersonName");
// const addressField = document.getElementById("address");
// const locationField = document.getElementById("location");
const pincodeField = document.getElementById("pincode");
const cityField = document.getElementById("city");
const stateField = document.getElementById("state");
const countryField = document.getElementById("country");
const mobileNumberField = document.getElementById("mobileNumber");
// const whatsappNumberField = document.getElementById("whatsappNumber");
// const gstNumberField = document.getElementById("gstNumber");
// const workingDaysField = document.getElementById("workingDays");
// const geoLocationField = document.getElementById("geoLocation");
// const geoAddressField = document.getElementById("geoAddress");
// const fssaiNoField = document.getElementById("fssaiNo");
// const validityDateField = document.getElementById("validityDate");
// const addtionalDetailsField = document.getElementById("addtionalDetails");
// const AF1Field = document.getElementById("AF1");
// const AF2Field = document.getElementById("AF2");
// const AF3Field = document.getElementById("AF3");
// const AF4Field = document.getElementById("AF4");
// const AF5Field = document.getElementById("AF5");

submitBtn = document.getElementById("submit");

//pincode api
pincodeField.onchange = ()=> {
    fetch("https://api.postalpincode.in/pincode/"+pincodeField.value)           //api for the get request
    .then(response => response.json())
    .then(data => {
        if(data[0]["Status"]=="Success"){
            // console.log(data[0]["PostOffice"][0]);
            cityField.value = data[0]["PostOffice"][0]["Region"];
            stateField.value = data[0]["PostOffice"][0]["State"];
            countryField.value = data[0]["PostOffice"][0]["Country"];
            mobileNumberField.focus();
        }
        else{
            alert("Enter a valid pincode");
        }  
    });
}

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        // console.log(true);
        submitBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/addRetailer.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Retailer Created Succesfully!");
                        window.location.replace("retailer.php");
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







