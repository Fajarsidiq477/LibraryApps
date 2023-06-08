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

export { resetForm, getDataSentByButton };
