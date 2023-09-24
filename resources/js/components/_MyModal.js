import LitWithoutShadowDom from "./base/LitWithoutShadowDom";
import { html } from "lit";

class MyModal extends LitWithoutShadowDom {
    constructor() {
        super();

        this._initialListener();
    }

    _initialListener() {
        this._beforeModalShow();
    }

    _populateDataToModal(id) {

        

        try {
            // cari data ke API sesuai id
            const data[id] = {
                 bookCode : 'dummy' ;
                 bookTitle : 'dummy2' ;
                 bookAuthor : 'dummy3' ;
                 bookCategory : 'dummy4' ;
                 bookPublisher : 'dummy5' ;
                 bookEditor : 'dummy6' ;
                 bookTranslator : 'dummy7' ;
                 bookLanguage : 'dummy8' ;
                 bookYear : 'dummy9' ;
                 bookTotalPages : 'dummy10' ;
                 bookVolume : 'dummy11' ;
                 bookKind : 'dummy12' ;
                 bookStatus : 'dummy13' ;
            }
        } catch (error) {
         console.log(error.message)   
        }
    };

    _beforeModalShow() {
        this.addEventListener("show.bs.modal", (e) => {
            if (e.relatedTarget.dataset.mode == "add") {
                this.querySelector(".modal-title").textContent = "Tambah Buku";
            } else {
                this.querySelector(".modal-title").textContent = "Edit Buku";

                this._populateDataToModal(e.relatedTarget.dataset.id);
            }
        });
    }

    _previewImage(e) {
        const image = e.srcElement.files[0];
        const bookCoverDisplay =
            e.srcElement.parentElement.querySelector("#bookCoverDisplay");

        this._displayImage(image, bookCoverDisplay);
    }

    _displayImage(image, bookCoverDisplay) {
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onprogress = () => {
            bookCoverDisplay.setAttribute("src", "./../images/spinner.gif");
        };
        reader.onload = () => {
            setTimeout(() => {
                bookCoverDisplay.setAttribute("src", reader.result);
            }, 300);
        };
    }

    _getFormData() {
        const mode = this.querySelector("#form-mode").value;
        const id = this.querySelector("#id").value || null;

        const bookCode = this.querySelector("#bookCodeInput").value;
        const bookTitle = this.querySelector("#bookTitleInput").value;
        const bookAuthor = this.querySelector("#bookAuthorInput").value;
        const bookCategory = this.querySelector("#bookCategoryInput").value;
        const bookPublisher = this.querySelector("#bookPublisherInput").value;
        const bookEditor = this.querySelector("#bookEditorInput").value;
        const bookTranslator = this.querySelector("#bookTranslatorInput").value;
        const bookLanguage = this.querySelector("#bookLanguageInput").value;
        const bookYear = this.querySelector("#bookYearInput").value;
        const bookTotalPages = this.querySelector("#bookTotalPagesInput").value;
        const bookVolume = this.querySelector("#bookVolumeInput").value;
        const bookKind = this.querySelector("#bookKindInput").value;
        const bookStatus = this.querySelector("#bookStatusInput").value;

        const bookCover = `${bookTitle.split(" ").join("-")}.${
            this.querySelector("#bookCoverInput").files[0].type.split("/")[1]
        }`;
        console.log(bookCover);

        let data = {};

        return (data = {
            mode,
            id,
            bookCover,
            bookCode,
            bookTitle,
            bookAuthor,
            bookCategory,
            bookPublisher,
            bookEditor,
            bookTranslator,
            bookLanguage,
            bookYear,
            bookTotalPages,
            bookVolume,
            bookKind,
            bookStatus,
        });
    }

    _submitModal(e) {
        e.preventDefault();
        const data = this._getFormData();

        console.log(data);
    }

    render() {
        return html`
            <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <button
                            type="button"
                            class="btn-admin-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <h1 class="modal-title fs-5 text-light"></h1>
                    </div>
                    <div class="modal-body">
                        <form
                            action="#"
                            id="form-modal"
                            @submit=${this._submitModal}
                        >
                            <input type="text" id="form-mode" hidden />
                            <input type="text" id="id" hidden />

                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="image-cover">
                                        <img
                                            src="http://placehold.co/160x225"
                                            alt="book cover"
                                            id="bookCoverDisplay"
                                            class="img-fluid"
                                        />
                                        <input
                                            type="file"
                                            name=""
                                            id="bookCoverInput"
                                            accept="image/*"
                                            hidden
                                            @change=${this._previewImage}
                                        />
                                        <label
                                            for="bookCoverInput"
                                            class="btn btn-success rounded-circle image-cover-button"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="bookCodeInput" class="mb-2">
                                            Kode Buku
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control is-invalid"
                                            id="bookCodeInput"
                                        />
                                        <div class="invalid-feedback">
                                            Kode buku harus lebih dari 100
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookTitleInput"
                                            class="mb-2"
                                        >
                                            Judul Buku
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookTitleInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookAuthorInput"
                                            class="mb-2"
                                        >
                                            Penulis
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookAuthorInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookCategoryInput"
                                            class="mb-2"
                                        >
                                            Kategori
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookCategoryInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookPublisherInput"
                                            class="mb-2"
                                        >
                                            Penerbit
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookPublisherInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookEditorInput"
                                            class="mb-2"
                                        >
                                            Editor
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookEditorInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookTranslatorInput"
                                            class="mb-2"
                                        >
                                            Penerjemah
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookTranslatorInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookLanguageInput"
                                            class="mb-2"
                                        >
                                            Bahasa
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookLanguageInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bookYearInput" class="mb-2">
                                            Tahun Terbit
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="bookYearInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookTotalPagesInput"
                                            class="mb-2"
                                        >
                                            Jumlah Halaman
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookTotalPagesInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookVolumeInput"
                                            class="mb-2"
                                        >
                                            Volume
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="bookVolumeInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bookKindInput" class="mb-2">
                                            Jenis
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="bookKindInput"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="bookStatusInput"
                                            class="mb-2"
                                        >
                                            Status Buku
                                        </label>
                                        <select
                                            name="status"
                                            id="bookStatusInput"
                                            class="form-select custom-form-control"
                                        >
                                            <option value="">---</option>
                                            <option value="">Tersedia</option>
                                            <option value="">Dipinjam</option>
                                            <option value="">Hilang</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 text-end">
                                        <button
                                            type="submit"
                                            class="btn btn-dark"
                                        >
                                            Selesai
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            ;
        `;
    }
}

customElements.define("my-modal", MyModal);
