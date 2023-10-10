// let getIdUser = (element) => {
//     let ID = element.id;
//     let getModal = document.getElementById("deleteUser");

//     setTimeout(function () {
//         getModal.querySelector("[name='delete-btn']").value = ID;
//     }, 100);
// }

let getIdUser = (element) => {
    let ID = element.parentElement.id;
    // let getModal = document.getElementById("modal");
    console.log(ID);
    // console.log(getModal);
}