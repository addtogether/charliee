function deleteRetailer(id){
    // console.log(id);
        // Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/editRetailer.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    // console.log(data);
                    alert("Retailer Deleted Succesfully!");
                        window.location.replace("retailer.php");
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("deleteRetailerID",id);
        xhr.send(formData); // sending form data to php
}

const dataTable = new simpleDatatables.DataTable("#example", {
	searchable: true,
	fixedHeight: true,
})
