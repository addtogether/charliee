const form = document.querySelector("form");

const categoryField = document.getElementById("category");
const subCategoryField = document.getElementById("subCategory");
const productField = document.getElementById("product");

submitBtn = document.getElementById("submit");

//getting url parameter
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const orderID = urlParams.get('o');

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        submitBtn.disabled = true;

        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/orderProduct.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Product Added Succesfully!");
                        window.location.replace("retailersOrder.php?o="+orderID);
                        // console.log(data);
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

// subLocation dropdown
categoryField.onchange = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/orderProduct.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data);
                subCategoryField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("categoryDropdown",categoryField.value);
    xhr.send(formData); // sending form data to php
}

// retailerName dropdown
subCategoryField.onchange = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/orderProduct.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data);
                productField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("subCategoryDropdown",subCategoryField.value);
    xhr.send(formData); // sending form data to php
}


