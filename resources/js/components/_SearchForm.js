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
        displayMode: {
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
        if (!this.hasAttribute("displayMode")) {
            throw new Error(
                `Atribut "displayMode" harus diterapkan pada elemen ${this.localName}`
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

    _populateDataToAdminBody(data) {
        let html = "";

        if (data.data != null) {
            html = data.data.map((d) => {
                return `
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img
                                src="/storage/book_covers/${d.lend_book_cover}"
                                alt="Book cover"
                                style="width: 100px;"
                            />
                        </td>
                        <td>${d.lend_book_code}</td>
                        <td>${d.lend_book_title}</td>
                        <td>${d.lend_user_name}</td>
                        <td>${d.lend_date}</td>
                        <td>${
                            d.lend_status == "0" ? "dipinjam" : "dikembalikan"
                        }</td>
                        <td>
                            <a
                                href="#"
                                class="btn btn-success finish-lend"
                                id="${d.lend_id}"
                            >
                                <i class="bi bi-check-square-fill"></i>
                            </a>
                        </td>
                    </tr>
                `;
            });
        }

        const displayTo = document.querySelector(this.displayTo);

        displayTo.innerHTML = html;

        resultMessageField.innerHTML = `<span>${data.message}</span>`;
    }
    _populateDataToUserBody(data) {
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
                                bookDetailUrl="/book/${d.book_code}"
                                bookFavoriteUrl="..."
                                bookFavorite=false
                                bookCover='storage/book_covers/${d.cover}'
    
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

            if (this.displayMode == "user") {
                return this._populateDataToUserBody(response.data);
            } else {
                return this._populateDataToAdminBody(response.data);
            }
        } catch (err) {
            resultMessageField.innerHTML = err.message;
        }
    }
}

customElements.define("search-form", SearchForm);
