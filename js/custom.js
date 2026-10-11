const parentDiv = document.querySelector("#parent-div");
const repeaterDiv = document.querySelector("#repeater-div");


const addBtn = document.querySelector(".add-btn");
addBtn.addEventListener("click", () => {
    const newDiv = document.createElement("div");
    newDiv.innerHTML = repeaterDiv.innerHTML;
    newDiv.style.marginBottom = "1rem"
    parentDiv.appendChild(newDiv);

})