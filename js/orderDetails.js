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
        xhr.open("POST", "backend/orderDetails.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                      alert("Status Updated Succesfully!");
                      window.location.replace("orderDetails.php?o="+orderID);
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

// for the side main status change start
function toggleModal(element) {
    const id = element.parentElement.parentElement.firstChild.nextElementSibling.nextElementSibling;
    const name = id.nextElementSibling.firstElementChild;
    const status = id.nextElementSibling.nextElementSibling.firstElementChild;
    // console.log(id.innerHTML);
    // console.log(name);
    // console.log(status);
    name.scrollIntoView();
  
    document.getElementById('orderID').value = id.innerHTML;
    document.getElementById('retailerName').value = name.innerHTML;
    document.getElementById('status').value = status.innerHTML;
    document.getElementById('submit').disabled = false;
  }
  
  // for the side main status change end 