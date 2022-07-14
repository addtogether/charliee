// for the side main status change start
function toggleModal(element) {
    const id = element.parentElement.parentElement.firstChild.nextElementSibling.nextElementSibling;
    const name = id.nextElementSibling.firstElementChild;
    const status = id.nextElementSibling.nextElementSibling.firstElementChild;
    // console.log(id.innerHTML);
    // console.log(name);
    // console.log(status);
  
    document.getElementById('retailerID').value = id.innerHTML;
    document.getElementById('retailerName').value = name.innerHTML;
    document.getElementById('status').value = status.innerHTML;
    document.getElementById('submit').disabled = false;
  }
  
  // for the side main status change end 