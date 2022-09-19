"use strict";

/**
 * Activity Form
 */

// Elements
const subtractMoney = document.querySelector("#subtractMoney");
const addMoney = document.querySelector("#addMoney");
const activityForm = document.querySelector("#activityForm");
const addCategories = document.querySelectorAll(".addCategories");
const subtractCategories = document.querySelectorAll(".subtractCategories");
const closeForm = document.querySelector("#closeForm");

// Events
subtractMoney.addEventListener("click", () => {
    showSubtractCategories();
    hideAddCategories();
    showFormAndCloseBtn();
});

addMoney.addEventListener("click", () => {
    showAddCategories();
    hideSubtractCategories();
    showFormAndCloseBtn();
});

closeForm.addEventListener("click", () => {
    hideSubtractCategories();
    hideAddCategories();
    hideFormAndCloseBtn();
});

// Methods
const showSubtractCategories = () => {
    subtractCategories.forEach((category) => {
        category.classList.remove("d-none");
    });
};

const hideSubtractCategories = () => {
    subtractCategories.forEach((category) => {
        category.classList.add("d-none");
    });
};

const showAddCategories = () => {
    addCategories.forEach((category) => {
        category.classList.remove("d-none");
    });
};

const hideAddCategories = () => {
    addCategories.forEach((category) => {
        category.classList.add("d-none");
    });
};

const showFormAndCloseBtn = () => {
    activityForm.classList.remove("d-none");
    closeForm.classList.remove("d-none");
};

const hideFormAndCloseBtn = () => {
    activityForm.classList.add("d-none");
    closeForm.classList.add("d-none");
};

/**
 * Toast notification
 */

window.addEventListener("swal:toast", (event) => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon: event.detail.icon,
        title: event.detail.title,
    });
});
