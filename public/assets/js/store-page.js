//select all logic
const stores = document.querySelectorAll(".select-store__store");
const selectAllcheckbox = document.querySelector("#customCheck1");
const selectStoreSpan = document.querySelector("#select-store__title");
const selectedStoreContainer = document.querySelector(
    "#selected-store__selected-stores"
);

selectAllcheckbox.addEventListener(
    "change",
    ({ target: { checked: isChecked } }) => {
        for (let store of stores) {
            if (!isChecked) {
                store.className = "select-store__store";
                selectedStoreContainer.innerHTML = "None";
            } else {
                store.className =
                    "select-store__store select-store__store--selected";
                selectedStoreContainer.innerHTML = "All";
            }
        }
    }
);

const toogleIndexNode = store => {
    store.classList.toggle("select-store__store--selected");
    const selectedStores = document.querySelectorAll(
        ".select-store__store--selected"
    );
    //update the length of selected stores
    selectStoreSpan.textContent = selectedStores.length;

    selectedStoresList = [];

    selectedStores.forEach(store => {
        selectedStoresList.push(
            store.querySelector(".store-name").innerText.trim()
        );
    });

    selectedStoreContainer.innerHTML = selectedStoresList.join(", ");
};

for (let store of stores) {
    store.addEventListener("click", () => {
        toogleIndexNode(store);
    });
}

//stores search
const searchInput = document.querySelector(
    ".select-store__search-containner input"
);
const storesContainner = document.querySelector(
    ".select-store__stores-containner"
);

searchInput.addEventListener("keyup", ({ target: { value } }) => {
    let newStoresList = [];
    for (let store of stores) {
        if (store.id.includes(value)) newStoresList.push(store);
    }

    if (newStoresList.length === 0) newStoresList = stores;

    removeAllChildNodes(storesContainner);
    addAllChildNodes(storesContainner, newStoresList);
});

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

function addAllChildNodes(parent, nodesList) {
    const myList = nodesList;
    while (myList.length > 0) {
        parent.appendChild(myList[0]);
        myList.shift();
    }
}

//last section inputs logic
const deleteBtns = document.querySelectorAll(".delete");
const clearTerritories = document.querySelector(
    ".last-section__territories button"
);
const territoriesContainner = document.querySelector(
    ".last-section__territories .elements-containner"
);
const clearStories = document.querySelector(".last-section__stories button");
const storiesContainner = document.querySelector(
    ".last-section__stories .elements-containner"
);
const elementsContainners = document.querySelectorAll(".elements-containner");
const lastSectionInputs = document.querySelectorAll(".last-section input");

for (let element of elementsContainners) {
    element.addEventListener("click", e => {
        let node;
        if (e.target.className === "delete") {
            node = e.target.parentNode;
        } else if (e.target.className === "delete-img") {
            node = e.target.parentNode.parentNode;
        }
        element.removeChild(node);

        //disable btn logic
        const clearBtn = element.parentNode.nextElementSibling;
        if (element.childNodes.length === 0) clearBtn.setAttribute("disabled");
    });
}

clearTerritories.addEventListener("click", e => {
    removeAllChildNodes(territoriesContainner);
    clearTerritories.setAttribute("disabled");
});
clearStories.addEventListener("click", e => {
    removeAllChildNodes(storiesContainner);
    clearStories.setAttribute("disabled");
});

for (let input of lastSectionInputs) {
    input.addEventListener("keyup", e => {
        const parentNode = e.target.previousElementSibling;
        if (e.keyCode === 13) {
            const childNode = document.createElement("div");
            childNode.className = "element";
            childNode.innerHTML = `
                <span>${e.target.value}</span>
                <span class="delete">
                    <img src="assets/img/icons/close.svg" alt="close icon" class="delete-img">
                </span>
            `;
            parentNode.appendChild(childNode);
            input.value = "";
        }
        //disable btn logic
        const clearBtn = input.parentNode.nextElementSibling;
        if (parentNode.childNodes.length > 0) {
            clearBtn.removeAttribute("disabled");
        } else {
            clearBtn.setAttribute("disabled");
        }
    });
}
