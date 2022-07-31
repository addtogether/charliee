const form = document.querySelector("form");

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
        xhr.open("POST", "backend/retailersOrder.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                      alert("Product Updated Succesfully!");
                      window.location.replace("retailersOrder.php?o="+orderID);
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

// for the side main order status change 
function toggleModalOrder(element) {
    const id = element.parentElement.parentElement.firstChild.nextElementSibling.nextElementSibling;
    const name = id.nextElementSibling;
    const status = id.nextElementSibling.nextElementSibling.firstElementChild;
    const totalQuantity = id.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
    // console.log(id.innerHTML);
    // console.log(name);
    // console.log(status);

    document.getElementById('status').innerHTML = "<option selected disabled value=''>Select Status</option><option>Delivered</option><option>Pending</option><option>Rejected</option><option>Returned</option><option>Deffered</option>";

    document.body.scrollIntoView({behavior: "smooth"});
    
    document.getElementById('orderBoolean').value = true;
    document.getElementById('orderDetailID').value = id.innerHTML;
    document.getElementById('productName').value = name.innerHTML;
    document.getElementById('totalQuantity').value = totalQuantity.innerHTML;
    document.getElementById('status').value = status.innerHTML;
    document.getElementById('submit').disabled = false;
}
  
  // for the side main return status change 
function toggleModalReturn(element) {
    const id = element.parentElement.parentElement.firstChild.nextElementSibling.nextElementSibling;
    const name = id.nextElementSibling;
    const status = id.nextElementSibling.nextElementSibling.firstElementChild;
    const totalQuantity = id.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
    // console.log(id.innerHTML);
    // console.log(name);
    // console.log(status);

    document.getElementById('status').innerHTML = "<option selected disabled value=''>Select Status</option><option>Accepted</option><option>Pending</option><option>Rejected</option><option>Deffered</option>";

    document.body.scrollIntoView({behavior: "smooth"});
    
    document.getElementById('orderBoolean').value = false;
    document.getElementById('orderDetailID').value = id.innerHTML;
    document.getElementById('productName').value = name.innerHTML;
    document.getElementById('totalQuantity').value = totalQuantity.innerHTML;
    document.getElementById('status').value = status.innerHTML;
    document.getElementById('submit').disabled = false;
}