import "./styles/style.scss";
import { resetForm, getDataSentByButton } from "./scripts/utils/modal-utils";
export let stepIndex = 0;
// Multistep Form
const steps = modalEl.querySelectorAll(".step");
const btnStepNext = modalEl.querySelector(".btn-step-next");

export const displayImage = (image, imageInputDisplay) => {
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onprogress = () => {
        imageInputDisplay.setAttribute("src", "./../images/spinner.gif");
    };
    reader.onload = () => {
        setTimeout(() => {
            imageInputDisplay.setAttribute("src", reader.result);
        }, 2000);
    };
};

export const whenModalShow = (modalEl, category, event) => {
    const formModal = modalEl.querySelector("#form-modal");
    const formMode = modalEl.querySelector("#form-mode");
    let obj;

    if (steps && btnStepNext) {
        stepIndex = 0;

        // trigger next step
        if (stepIndex === 0) {
            steps.forEach((step) => {
                step.style.display = "none";
            });
            steps[stepIndex].style.display = "block";
            btnStepNext.style.display = "block";
        }
    }

    resetForm(formModal);

    const { mode, id } = getDataSentByButton(event);

    // Update the modal's content.
    const modalTitle = modalEl.querySelector(".modal-title");

    switch (category) {
        case "books":
            obj = "Buku";
            break;
        case "users":
            obj = "Pengguna";
            break;
        case "lends":
            obj = "Pinjam Buku";
            break;
    }

    if (mode === "add") {
        modalTitle.innerText = `Tambahkan ${obj}`;
    }

    if (mode === "edit" && id) {
        modalTitle.innerText = `Edit ${obj}`;

        formModal.querySelector("#id").value = id;
    }

    formMode.value = mode;
};

if (btnStepNext) {
    btnStepNext.addEventListener("click", () => {
        if (stepIndex < steps.length - 1) {
            steps[stepIndex].style.display = "none";
        }
        ++stepIndex;
        nextStep(stepIndex, steps);
    });

    const nextStep = (stepIndex, steps) => {
        if (stepIndex < steps.length) {
            steps[stepIndex].style.display = "block";
        }

        if (stepIndex === steps.length - 1) {
            btnStepNext.style.display = "none";
        }

        return false;
    };
}
