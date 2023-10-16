let getIdDelete = (element,selector) => {
    let ID = element.parentElement.id;
    let getModal = document.getElementById(`${selector}`);
    setTimeout(function () {
        getModal.querySelector("[name='delete-btn']").value = ID;
    }, 100);
    console.log(ID);
}
