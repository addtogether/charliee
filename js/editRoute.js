const form = document.querySelector("form");
const table = document.getElementById("myTable");
const tbody = document.getElementById("routeList");

const sequence = document.getElementById("sequence");
const retailerName = document.getElementById("retailerName");
const retailerStatus = document.getElementById("retailerStatus");
const locationField = document.getElementById("location");
const subLocationField = document.getElementById("subLocation");
const subLocationInitialField = document.getElementById("subLocationInitial");
const retailerNameField = document.getElementById("retailerName");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        if(tbody.children[0].children.length == 1){
            alert("Please add atleast 1 row to proceed");
        }
        else{
            submitBtn.disabled = true;
    
            //gettting table data
            let data = [...table.rows].map(t => [...t.children].map(u => u.innerText));
            json = data.reduce((json, value, key) => { json[key] = value; return json; }, {});
    
            //Ajax
            let xhr = new XMLHttpRequest(); //creating XML object
            xhr.open("POST", "backend/editRoute.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        if(data == "success"){
                            alert("Route Updated Succesfully!");
                            window.location.replace("routeShow.php");
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
            formData.append("routes",JSON.stringify(json));
            xhr.send(formData); // sending form data to php
            submitBtn.disabled = false;
        }
    }
}

//delete row
function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

//filling the retailer sequence table
function addRow(){
    if(sequence.value==""){
        sequence.focus();
    }
    else if(retailerName.value == ""){
        retailerName.focus();
    }
    else if(retailerStatus.value == ""){
        retailerStatus.focus();
    }
    else if(tbody.children[0].children.length == 1){
        if(retailerStatus.options[retailerStatus.selectedIndex].text == "ON"){
            tbody.innerHTML = "<tr><td hidden>"+retailerName.value+"</td><td>"+sequence.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-correct'>ON</span></td></tr>";
        }
        else{
            tbody.innerHTML = "<tr><td hidden>"+retailerName.value+"</td><td>"+sequence.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-inc'>OFF</span></td></tr>";
        }
    }
    else if(retailerStatus.options[retailerStatus.selectedIndex].text == "ON"){
        tbody.innerHTML += "<tr><td hidden>"+retailerName.value+"</td><td>"+sequence.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-correct'>ON</span></td></tr>";
    }
    else{
        tbody.innerHTML += "<tr><td hidden>"+retailerName.value+"</td><td>"+sequence.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-inc'>OFF</span></td></tr>";
    }
    // let data = [...table.rows].map(t => [...t.children].map(u => u.innerText));
    // console.log(JSON.stringify(data));
    // json = data.reduce((json, value, key) => { json[key] = value; return json; }, {});
    // console.log(JSON.stringify(json));
}

//initial subLocation dropdown
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/editRoute.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data);
                subLocationField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("locationDropdownInitial",locationField.value);
    formData.append("subLocationDropdownInitial",subLocationInitialField.value);
    xhr.send(formData); // sending form data to php


//initial retailerName dropdown
    //Ajax
    let xhr1 = new XMLHttpRequest(); //creating XML object
    xhr1.open("POST", "backend/editRoute.php", true);
    xhr1.onload = ()=>{
        if(xhr1.readyState == XMLHttpRequest.DONE){
            if(xhr1.status == 200){
                let data1 = xhr1.response;
                // console.log(data1);
                retailerNameField.innerHTML = data1;
                // subLocationInitialField.remove();
            }
        }
    }
    // Sending data from Ajax to php
    let formData1 = new FormData(); //creating new formData
    formData1.append("subLocationDropdownInitial1",subLocationInitialField.value);
    xhr1.send(formData1); // sending form data to php

// subLocation dropdown
locationField.onchange = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/editRoute.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data);
                subLocationField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("locationDropdown",locationField.value);
    xhr.send(formData); // sending form data to php
}

// retailerName dropdown
subLocationField.onchange = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/editRoute.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                // console.log(data);
                retailerNameField.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("subLocationDropdown",subLocationField.value);
    xhr.send(formData); // sending form data to php
}


