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
});

function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('outputTable');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1",raw: true});
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
      XLSX.writeFile(wb, fn || ('Retailers.' + (type || 'xlsx')));
}

function ExportToExcelTemplate(type, fn, dl) {
    var elt = document.getElementById('outputTable');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1",raw: true, sheetRows: 1, display: true});
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
      XLSX.writeFile(wb, fn || ('RetailerTemplate.' + (type || 'xlsx')));
}

function handleFile(e) {
    var file = e.target.files[0];
    if(file['name'].split('.').pop()=='xlsx'){
        var reader = new FileReader();
        reader.onload = function(e) {
        //   var data = e.target.result;
        var data = new Uint8Array(e.target.result);
        /* reader.readAsArrayBuffer(file) -> data will be an ArrayBuffer */
        //   var workbook = XLSX.read(e.target.result);
        var workbook = XLSX.read(data, {type: 'array'});
        var worksheet = workbook.Sheets[workbook.SheetNames[0]];
        var aoa = XLSX.utils.sheet_to_json(worksheet, {header: 1});
        // console.log(JSON.stringify(aoa));
    
            //Ajax
            let xhr = new XMLHttpRequest(); //creating XML object
            xhr.open("POST", "backend/excelUpload.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        if(data == "success"){
                            alert("Excel Uploaded Successfully");
                            location.href = "retailer.php"
                        }
                        else if(data == "Wrong Excel File Template!"){
                            alert(data);
                        }
                        else if(data == "Add atleast 1 row!"){
                            alert(data);
                        }
                        else if(data == "Excel contains duplicate mobile numbers"){
                            alert(data);
                        }
                        else{
                            alert("Something went wrong!");
                        }
                        // console.log(data);
                        // reportingManagerField.innerHTML = data;
                    }
                }
            }
            // Sending data from Ajax to php
            let formData = new FormData(); //creating new formData
            formData.append("excel",JSON.stringify(aoa));
            xhr.send(formData); // sending form data to php
        
        /* DO SOMETHING WITH workbook HERE */
        // console.log(data);
        // console.log(workbook);
        // console.log(aoa);
        };
        reader.readAsArrayBuffer(file);
    }
    else{
        alert("Please select excel(xlsx) file only!");
    }

}
excelUpload = document.getElementById("excelUpload");
excelUpload.addEventListener("change", handleFile, false);


