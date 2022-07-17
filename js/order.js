const form = document.querySelector("form");
const orderDate = document.getElementById("orderDate");
const orderList = document.getElementById("orderList");
const noOrderList = document.getElementById("noOrderList");
const returnList = document.getElementById("returnList");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        submitBtn.disabled = true;

        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/order.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    form.classList.remove("was-validated");
                    // console.log(data);
                    orderList.innerHTML = data;
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php

        //Ajax
        // let xhr1 = new XMLHttpRequest(); //creating XML object
        // xhr1.open("POST", "backend/order.php", true);
        // xhr1.onload = ()=>{
        //     if(xhr1.readyState == XMLHttpRequest.DONE){
        //         if(xhr1.status == 200){
        //             let data1 = xhr1.response;
        //             form.classList.remove("was-validated");
        //             // console.log(data);
        //             noOrderList.innerHTML = data1;
        //         }
        //     }
        // }
        // // Sending data from Ajax to php
        // let formData1 = new FormData(); //creating new formData
        // formData1.append("noOrderDate", orderDate);
        // xhr1.send(formData1); // sending form data to php

        //Ajax
        let xhr2 = new XMLHttpRequest(); //creating XML object
        xhr2.open("POST", "backend/order.php", true);
        xhr2.onload = ()=>{
            if(xhr2.readyState == XMLHttpRequest.DONE){
                if(xhr2.status == 200){
                    let data2 = xhr2.response;
                    form.classList.remove("was-validated");
                    // console.log(data);
                    returnList.innerHTML = data2;
                }
            }
        }
        // Sending data from Ajax to php
        let formData2 = new FormData(); //creating new formData
        formData2.append("returnDate", orderDate);
        xhr2.send(formData2); // sending form data to php
        submitBtn.disabled = false;
    }
}