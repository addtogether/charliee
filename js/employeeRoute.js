const form = document.querySelector("form");
const table = document.getElementById("myTable");
const tbody = document.getElementById("routeList");

const retailerName = document.getElementById("retailerName");
const retailerStatus = document.getElementById("retailerStatus");
const locationField = document.getElementById("location");
const subLocationField = document.getElementById("subLocation");
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
            xhr.open("POST", "backend/employeeRoute.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        if(data == "success"){
                            alert("Route Created Succesfully!");
                            window.location.replace("employeeRoute.php");
                            // console.log(data);
                        }
                        else if(data == "Employee route for that day already exist!"){
                            alert(data);
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
retailers = [];
function addRow(){

    if(retailerName.value == ""){
        retailerName.focus();
    }
    else if(retailerStatus.value == ""){
        retailerStatus.focus();
    }
    else if(tbody.children[0].children.length == 1){
        if(retailerStatus.options[retailerStatus.selectedIndex].text == "ON"){
            retailers.push(retailerName.value);
            tbody.innerHTML = "<tr draggable='true' ondragstart='start()' ondragover='dragover()'><td hidden>"+retailerName.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-correct'>ON</span></td><td><input type='button' class='btn btn-danger' value='Delete' onclick='deleteRow(this)'/></td></tr>";
        }
        else{
            retailers.push(retailerName.value);
            tbody.innerHTML = "<tr draggable='true' ondragstart='start()' ondragover='dragover()'><td hidden>"+retailerName.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-inc'>OFF</span></td><td><input type='button' class='btn btn-danger' value='Delete' onclick='deleteRow(this)'/></td></tr>";
        }
    }
    else if(retailers.includes(retailerName.value)){
        alert("Retailer already added!");
    }
    else if(retailerStatus.options[retailerStatus.selectedIndex].text == "ON"){
        tbody.innerHTML += "<tr draggable='true' ondragstart='start()' ondragover='dragover()'><td hidden>"+retailerName.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-correct'>ON</span></td><td><input type='button' class='btn btn-danger' value='Delete' onclick='deleteRow(this)'/></td></tr>";
    }
    else{
        tbody.innerHTML += "<tr draggable='true' ondragstart='start()' ondragover='dragover()'><td hidden>"+retailerName.value+"</td><td>"+retailerName.options[retailerName.selectedIndex].text+"</td><td><span class='status-p bg-inc'>OFF</span></td><td><input type='button' class='btn btn-danger' value='Delete' onclick='deleteRow(this)'/></td></tr>";
    }
    // let data = [...table.rows].map(t => [...t.children].map(u => u.innerText));
    // console.log(JSON.stringify(data));
    // json = data.reduce((json, value, key) => { json[key] = value; return json; }, {});
    // console.log(JSON.stringify(json));
}

// subLocation dropdown
locationField.onchange = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/employeeRoute.php", true);
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
    xhr.open("POST", "backend/employeeRoute.php", true);
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


