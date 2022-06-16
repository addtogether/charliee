const form = document.querySelector("form");

const editProductIDField = document.getElementById("editProductID");
const productPhotoPreviewField = document.getElementById("productPhotoPreview");
const imagePreviewField = document.getElementById("image-preview");

submitBtn = document.getElementById("submit");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting

    if (form.checkValidity()){
        // console.log(true);
        submitBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/editProduct.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Product Updated Succesfully!");
                        window.location.replace("product.php");
                        //console.log(data);
                    }
                    else{
                        // console.log(data);
                        // alert(data);
                        alert("Something went wrong!");
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
//employee photo preview and change
productPhotoPreviewField.onclick = ()=>{
    alert("Are you sure you want to change this photo?");
    productPhotoPreviewField.hidden = true;
    imagePreviewField.hidden = false;
}







