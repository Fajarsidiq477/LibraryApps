var Jar;
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXPORTS
__webpack_require__.d(__webpack_exports__, {
  displayImage: () => (/* binding */ displayImage),
  stepIndex: () => (/* binding */ stepIndex),
  whenModalShow: () => (/* binding */ whenModalShow)
});

;// CONCATENATED MODULE: ./src/scripts/utils/modal-utils.js
const resetForm = (formModal) => {
    formModal.reset();
    imageInputDisplay.src = "http://placehold.co/165x225";
};

const getDataSentByButton = (event) => {
    const button = event.relatedTarget;
    const mode = button.getAttribute("data-bs-mode");
    const id = button.getAttribute("data-bs-id") || null;

    return { mode, id };
};



;// CONCATENATED MODULE: ./src/index.js



let stepIndex = 0;

// update image preview on modal when image has been uploaded
const displayImage = (image, imageInputDisplay) => {
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
// end image preview

// func when modal show has been triggered
const whenModalShow = (modalEl, category, event) => {
    const formModal = modalEl.querySelector("#form-modal");
    const formMode = modalEl.querySelector("#form-mode");
    let obj;
    const steps = modalEl.querySelectorAll(".step");
    const btnStepNext = modalEl.querySelector(".btn-step-next");

    // for multistep form -> check there multistep is exist?
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
    // end multistep form

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

    // multistep next funcionality
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
    // end multistep next funcionality
};
// end func when modal show has been triggered

Jar = __webpack_exports__;
/******/ })()
;