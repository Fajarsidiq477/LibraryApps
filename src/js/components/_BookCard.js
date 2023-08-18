import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";

class BookCard extends LitWithoutShadowDom {
    static properties = {
        bookId: {
            type: String,
            reflect: true,
        },
        bookName: {
            type: String,
            reflect: true,
        },
        bookYear: {
            type: String,
            reflect: true,
        },
        bookGenre: {
            type: String,
            reflect: true,
        },
        bookAuthor: {
            type: String,
            reflect: true,
        },
        bookPublisher: {
            type: String,
            reflect: true,
        },
        bookStatus: {
            type: String,
            reflect: true,
        },
    };

    _checkAvailabilityProperty() {
        if (!this.hasAttribute("bookId")) {
            throw new Error(
                `Atribut "bookId" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookName")) {
            throw new Error(
                `Atribut "bookName" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookYear")) {
            throw new Error(
                `Atribut "bookYear" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookGenre")) {
            throw new Error(
                `Atribut "bookGenre" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookAuthor")) {
            throw new Error(
                `Atribut "bookAuthor" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookPublisher")) {
            throw new Error(
                `Atribut "bookPublisher" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookStatus")) {
            throw new Error(
                `Atribut "bookStatus" harus diterapkan pada elemen ${this.localName}`
            );
        }
    }
    constructor() {
        super();

        this._checkAvailabilityProperty();
    }

    _bookDetail() {
        const offCanvas = document.querySelector(
            "#offcanvasRight #offcanvas-content"
        );
        offCanvas.querySelector(".aside-form").classList.add("d-none");

        offCanvas.querySelector(".book").innerHTML = `

            <div class="book-detail text-center px-4">
                <div class="aside-header">
                    <span
                        class="d-inline-block bg-secondary badge py-2 px-4 rounded text-light mb-2"
                        >${this.bookGenre}</span
                    >
                    <img
                        src="http://placehold.co/160x225"
                        class="d-block mx-auto img-fluid mb-2"
                        alt="book-cover"
                    />

                    
                </div>
                <div class="aside-description text-start mt-4">
                    <h4 class="book-title"><a href="#" class="text-dark">${this.bookName}</a></h4>
                    <p class="book-year">${this.bookYear}</p>
                    <h5 class="book-author">${this.bookAuthor}</h5>
                    <p class="book-publisher fw-bold">${this.bookPublisher}</p>
                    <p class="book-status">
                        <span>Status</span>
                        <span class="badge text-white bg-secondary p-1">${this.bookStatus}</span>
                    </p>
                </div>
            </div>
        `;
    }

    render() {
        return html`
            <div>
                <a
                    @click=${this._bookDetail}
                    style="text-decoration:none"
                    class="book-field text-dark"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight"
                    data-bs-source="bookDetail"
                >
                    <div class="row mb-2">
                        <div class="col col-md-5">
                            <img
                                src="http://placehold.co/160x225"
                                alt="book cover"
                                class="img-fluid"
                            />
                        </div>
                        <div class="col col-md-7 pt-2">
                            <h4 class="book-title">${this.bookName}</h4>
                            <h5 class="book-author">${this.bookAuthor}</h5>
                            <p class="book-year">${this.bookYear}</p>
                        </div>
                    </div>
                </a>
            </div>
        `;
    }
}

customElements.define("book-card", BookCard);
