import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";
import axios from "axios";

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
        token: {
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
        if (!this.hasAttribute("token")) {
            throw new Error(
                `Atribut "token" harus diterapkan pada elemen ${this.localName}`
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
                        class="btn bg-secondary text-white"
                        type="submit"
                        id="search"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        `;
    }

    _populateDataToBody(data) {
        let html = "";

        if (data.data != null) {
            html = data.data.map((d) => {
                return `
                        <div class="col-12 col-md-5 d-block border-bottom border-3">
                            <book-card
                                bookId="${d.id}"
                                bookName="${d.title}"
                                bookYear="${d.publication_year}"
                                bookGenre="${d.kategori}"
                                bookAuthor="${d.author}"
                                bookPublisher="${d.publisher}"
                                bookStatus="${d.book_status}"
                                bookDetailUrl="..."
                                bookFavoriteUrl="..."
                                bookFavorite=false
                                bookCover='cover_images/${d.cover}'
    
                            >
                            </book-card>
                        </div>
                        `;
            });
        }

        const displayTo = document.querySelector(this.displayTo);

        displayTo.innerHTML = html;

        resultMessageField.innerHTML = `<span>${data.message}</span>`;
    }

    async _search(e) {
        e.preventDefault();

        const searchKeyword =
            e.srcElement.querySelector("#search-keyword").value;
        const resultMessageField = document.querySelector(
            "#resultMessageField"
        );

        resultMessageField.innerHTML = `
            <span>Mencari ... </span>    
            <span class="spinner-border spinner-border-sm text-primary ms-2" role="status">
            </span>
        `;

        try {
            resultMessageField.innerHTML = `
                <div class="spinner-border" role="status">
                </div>
            `;

            const response = await axios.post(
                `${this.searchFrom}`,
                {
                    keyword: searchKeyword,
                },
                {
                    headers: {
                        "X-CSRF-TOKEN": `${this.token}`,
                    },
                }
            );

            this._populateDataToBody(response.data);
        } catch (err) {
            resultMessageField.innerHTML = err.message;
        }
    }
}

customElements.define("search-form", SearchForm);
