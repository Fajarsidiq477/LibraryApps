import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";
import axios from "axios";

class AsideCanvas extends LitWithoutShadowDom {
    static properties = {
        id: {
            type: String,
            reflect: true,
        },
        genres: {
            type: String,
            reflect: true,
        },
        filterFrom: {
            type: String,
            reflect: true,
        },
        token: {
            type: String,
            reflect: true,
        },
        displayTo: {
            type: String,
            reflect: true,
        },
    };

    constructor() {
        super();

        this._initialListener();
    }

    _initialListener() {
        this.addEventListener("hide.bs.offcanvas", (e) => {
            setTimeout(() => {
                e.target
                    .querySelector("#offcanvas-content .aside-form")
                    .classList.remove("d-none");

                e.target.querySelector("#offcanvas-content .book").innerHTML =
                    "";
            }, 300);
        });

        this.addEventListener("show.bs.offcanvas", (e) => {
            const genres = JSON.parse(this.genres);

            let select = '<option selected value="">---</option>';

            genres.forEach((genre) => {
                select += `<option value="${genre.id}">${genre.name}</option>`;
            });

            e.target.querySelector("#filterCategory").innerHTML = select;
        });
    }

    _populateDataToBody(data) {
        let html = "";

        if (data.data != null) {
            html = data.data
                .map((d) => {
                    return `
                        <div class="col-12 col-md-5 d-block border-bottom border-3">
                            <book-card
                                bookId="${d.id}"
                                bookName="${d.title}"
                                bookYear="${d.publication_year}"
                                bookGenre="${d.category}"
                                bookAuthor="${d.author}"
                                bookPublisher="${d.publisher}"
                                bookStatus="${d.book_status}"
                                bookDetailUrl="/book/${d.book_code}"
                                bookFavoriteUrl="..."
                                bookFavorite=false
                                bookCover='storage/book_covers/${d.cover}'
                            >
                            </book-card>
                        </div>
                        `;
                })
                .join(" ");
        }

        const displayTo = document.querySelector(this.displayTo);

        displayTo.innerHTML = html;

        const filterResultMessageField = document.querySelector(
            "#resultMessageField"
        );

        let status = "";
        const filterStatus = document.querySelector("#filterStatus").checked;
        const filterCategory = document.querySelector("#filterCategory").value;
        if (filterStatus) {
            status = "Tersedia";
        } else {
            status = "Semua Buku";
        }

        filterResultMessageField.innerHTML = `
            
            <p class="mb-0">
                <span class="fw-bold">Filter aktif:</span> 
                <span>
                ${[...[status, filterCategory]]}
                </span></p>

            <p>${data.message}</p>`;
    }

    async _searchByFilter(e) {
        e.preventDefault();

        // form data
        const filterStatus =
            e.srcElement.querySelector("#filterStatus").checked;

        const filterCategory =
            e.srcElement.querySelector("#filterCategory").value;

        const spinner = e.srcElement.querySelector(
            'button[type="submit"] .btn-spinner'
        );
        spinner.innerHTML = `
            <span class="spinner-border spinner-border-sm text-secondary ms-2" role="status">
        `;

        const filterErrorMessageField = e.srcElement.querySelector(
            ".filterErrorMessageField"
        );

        try {
            const response = await axios.post(
                `${this.filterFrom}`,
                {
                    filterStatus: filterStatus,
                    filterCategory: filterCategory,
                },
                {
                    headers: {
                        "X-CSRF-TOKEN": `${this.token}`,
                    },
                }
            );

            this._populateDataToBody(response.data);

            this.querySelector(".btn-close").click();
            spinner.innerHTML = "";
        } catch (err) {
            filterErrorMessageField.innerHTML = err.message;
            spinner.innerHTML = "";
        }
    }

    render() {
        return html`
            <div class="offcanvas-header">
               
            </div>
            <div class="offcanvas-body" id="offcanvas-content">
                <div class="aside-form">
                    <form id="offcanvas-form" @submit=${this._searchByFilter}>
                        <div
                            class="d-flex justify-content-center pb-3"
                            style="border-bottom: 2px solid rgba(0, 0, 0, 0.7)"
                        >
                            <span style="margin-right: 1rem">Filter</span>
                            <i class="bi bi-filter"></i>
                        </div>
                        <div class="container mt-3">
                            <h5>Status</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <label for="filterStatus">Tersedia</label>
                                <input
                                    type="checkbox"
                                    id="filterStatus"
                                    class="filterCheck"
                                    name="available"
                                />
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <label for="kategori">Kategori</label>
                                <select
                                    class="form-select form-select-sm ms-2 bg-transparent"
                                    id="filterCategory"
                                    name="genre"
                                ></select>
                            </div>
                        </div>
                        <p class="filterErrorMessageField text-danger mt-2"></p>
                        <div class="d-flex justify-content-center mt-3">
                            <button
                                class="btn bg-secondary text-white"
                                type="submit"
                            >
                                <span>Terapkan</span>
                                <span class="btn-spinner"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="book"></div>
            </div>
            <div class="offcanvas-header">
                <button
                    type="button"
                    class="btn btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                    style="margin: auto;"
                >
                </button>
            </div>
        `;
    }
}
customElements.define("aside-canvas", AsideCanvas);
