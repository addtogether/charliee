/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";


// Export Excel
function exportTableToExcel(tableID, filename = '') {
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

  // Specify file name
  filename = filename ? filename + '.xls' : 'excel_data.xls';

  // Create download link element
  downloadLink = document.createElement("a");

  document.body.appendChild(downloadLink);

  if (navigator.msSaveOrOpenBlob) {
    var blob = new Blob(['\ufeff', tableHTML], {
      type: dataType
    });
    navigator.msSaveOrOpenBlob(blob, filename);
  } else {
    // Create a link to the file
    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

    // Setting the file name
    downloadLink.download = filename;

    //triggering the function
    downloadLink.click();
  }
}
// year picker 
$("#datepicker").datepicker({
  format: "mm-yyyy",
  startView: "months",
  minViewMode: "months"
});

/// draggable row in table 
var row;

function start() {
  row = event.target;
}
function dragover() {
  var e = event;
  e.preventDefault();

  let children = Array.from(e.target.parentNode.parentNode.children);

  if (children.indexOf(e.target.parentNode) > children.indexOf(row))
    e.target.parentNode.after(row);
  else
    e.target.parentNode.before(row);
}

// for the side main status change start
function toggleModal(element) {
  let tableRowElement;
  tableRowElement = element.parentElement.parentElement;
  const name = tableRowElement.getElementsByClassName('name')[0].innerHTML;
  const status = tableRowElement.getElementsByClassName('status')[0].innerHTML;
  console.log(name);
  console.log(status);

  // document.getElementById('name').value = name;
  document.getElementById('status').value = status;

  const boxContent = document.querySelector('.content');
  console.log(boxContent);
  boxContent.innerHTML = name;
  console.log(boxContent);
}

function saveInfo(element) {

  let tableRowElement;
  tableRowElement = element.parentElement.parentElement;
  const status = document.getElementById('status').value;
  tableRowElement.getElementsByClassName('status')[0].innerHTML = status;

}

// for the side main status change end 