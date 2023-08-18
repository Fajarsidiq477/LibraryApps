import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";

class SearchForm extends LitWithoutShadowDom {
    static properties = {
        searchFrom: {
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

        this._checkAvailabilityProperty();
    }

    _checkAvailabilityProperty() {
        if (!this.hasAttribute("searchFrom")) {
            throw new Error(
                `Atribut "searchFrom" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("displayTo")) {
            throw new Error(
                `Atribut "displayTo" harus diterapkan pada elemen ${this.localName}`
            );
        }
    }

    render() {
        return html`
            <form action="" id="form-search" @submit=${this._search}>
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        id="search-keyword"
                        name="search-keyword"
                        aria-label="Text input with 2 dropdown buttons"
                        placeholder="Pencarian ...."
                    />
                    <button
                        class="btn bg-secondary text-light"
                        type="submit"
                        id="search"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        `;
    }

    _search(e) {
        e.preventDefault();

        const searchKeyword =
            e.srcElement.querySelector("#search-keyword").value;
        const resultMessageField = document.querySelector(
            "#resultMessageField"
        );

        resultMessageField.classList.remove("d-none");

        resultMessageField.innerHTML = `
            <span>Mencari ... </span>    
            <span class="spinner-border spinner-border-sm text-primary ms-2" role="status">
            </span>
        `;

        setTimeout(() => {
            try {
                if (searchKeyword.length == 0) {
                    return (resultMessageField.innerHTML = "");
                }

                if (searchKeyword.length > 0) {
                    return (resultMessageField.innerHTML = `<span>Buku dengan keyword "${searchKeyword}" berhasil ditemukan sebanyak 8 buku</span>`);
                }

                // throw new Error(
                //     `<span>Buku dengan keyword "${searchKeyword}" tidak ditemukan</span>`
                // );
            } catch (err) {
                resultMessageField.innerHTML = err.message;
            }
        }, 3000);
    }
}

customElements.define("search-form", SearchForm);
