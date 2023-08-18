import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";

class AsideCanvas extends LitWithoutShadowDom {
    static properties = {
        id: {
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
    }

    _searchByFilter(e) {
        e.preventDefault();

        // form data
        let status = "";
        const filterStatus =
            e.srcElement.querySelector("#filterStatus").checked;
        if (filterStatus) {
            status = "Tersedia";
        } else {
            status = "Tidak Tersedia";
        }
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

        setTimeout(() => {
            try {
                true;

                const filterResultMessageField = document.querySelector(
                    "#resultMessageField"
                );
                filterResultMessageField.innerHTML = `<span class="fw-bold">Filter aktif:</span> ${[
                    ...[status, filterCategory],
                ]}
                `;
                this.querySelector(".btn-close").click();
                spinner.innerHTML = "";
            } catch (err) {
                filterErrorMessageField.innerHTML = err.message;
                spinner.innerHTML = "";
            }
        }, 1000);
    }

    render() {
        return html`
            <div class="offcanvas-header">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body" id="offcanvas-content">
                <div class="aside-form">
                    <form id="offcanvas-form" @submit=${this._searchByFilter}>
                        <div
                            class="d-flex justify-content-center pb-3"
                            style="border-bottom: 2px solid rgba(0, 0, 0, 0.7)"
                        >
                            <span style="margin-right: 1rem">Filter</span>
                            <i data-feather="filter"></i>
                        </div>
                        <div class="container mt-3">
                            <h5>Status</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <label for="filterStatus">Tersedia</label>
                                <input
                                    type="checkbox"
                                    id="filterStatus"
                                    class="filterCheck"
                                />
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <label for="kategori">Kategori</label>
                                <select
                                    class="form-select form-select-sm ms-2 bg-transparent"
                                    id="filterCategory"
                                >
                                    <option selected value="">---</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
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
        `;
    }
}
customElements.define("aside-canvas", AsideCanvas);
