function deleteEmployee(id){
    // console.log(id);
        // Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/editEmployee.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    // console.log(data);
                    alert("Employee Deleted Succesfully!");
                    window.location.replace("employee.php");
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("deleteEmployeeID",id);
        xhr.send(formData); // sending form data to php
}

// const dataTable = new simpleDatatables.DataTable("#example", {
// 	searchable: true,
// 	fixedHeight: true,
// })

function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('outputTable');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1",raw: true});
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
      XLSX.writeFile(wb, fn || ('Employees.' + (type || 'xlsx')));
}

function ExportToExcelTemplate(type, fn, dl) {
    var elt = document.getElementById('outputTable');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1",raw: true, display: true});
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
      XLSX.writeFile(wb, fn || ('EmployeeTemplate.' + (type || 'xlsx')));
}