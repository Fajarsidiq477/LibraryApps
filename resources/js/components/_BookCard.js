import { html } from "lit";
import LitWithoutShadowDom from "./base/LitWithoutShadowDom";

class BookCard extends LitWithoutShadowDom {
    static properties = {
        bookId: {
            type: String,
            reflect: true,
        },
        bookCover: {
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
        bookDetailURL: {
            type: String,
            reflect: true,
        },
        bookFavorite: {
            type: Boolean,
            reflect: true,
        },
    };

    _checkAvailabilityProperty() {
        if (!this.hasAttribute("bookId")) {
            throw new Error(
                `Atribut "bookId" harus diterapkan pada elemen ${this.localName}`
            );
        }

        if (!this.hasAttribute("bookCover")) {
            throw new Error(
                `Atribut "bookCover" harus diterapkan pada elemen ${this.localName}`
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
        if (!this.hasAttribute("bookDetailURL")) {
            throw new Error(
                `Atribut "bookDetailURL" harus diterapkan pada elemen ${this.localName}`
            );
        }
        if (!this.hasAttribute("bookFavorite")) {
            throw new Error(
                `Atribut "bookFavorite" harus diterapkan pada elemen ${this.localName}`
            );
        }
    }
    constructor() {
        super();

        // this._checkAvailabilityProperty();
    }

    _bookDetail(e) {
        e.stopPropagation();
        const offCanvas = document.querySelector(
            "#offcanvasRight #offcanvas-content"
        );
        offCanvas.querySelector(".aside-form").classList.add("d-none");

        let bookStatus;

        switch (this.bookStatus) {
            case "0":
                bookStatus =
                    "<span class='badge text-white bg-success p-1'>Tersedia</span>";
                break;
            case "1":
                bookStatus =
                    "<span class='badge text-white bg-danger p-1'>Dipinjam</span>";
                break;
            case "2":
                bookStatus =
                    "<span class='badge text-white bg-dark p-1'>Hilang</span>";
                break;
        }

        offCanvas.querySelector(".book").innerHTML = `

            <div class="book-detail text-center px-4">
                <div class="aside-header">
                    <img
                        src="${this.bookCover}"
                        class="d-block mx-auto img-fluid mb-2"
                        style="width: 300px; height: 415px"
                        alt="book-cover"
                    />
                </div>
                
                <div class="aside-description mt-4">
                    <button type="button" class="btn btn-secondary" style="text-transform: uppercase; margin:5px; color: whitesmoke; line-height: 15px; font-size: 0.75rem; font-weight: bold;">
                    ${this.bookGenre}
                    </button>
                    <span id="favorite" class="bi bi-star favorite-icon" style="vertical-align: -.175em; margin:5px; font-size:1.5rem; color:#ffc107!important"></span>
                </div>
                
                <div class="aside-description text-start mt-4">
                    <a href="${this.bookDetailURL}" class="text-dark"><h4 class="book-title">${this.bookName}</h4></a>
                    <p class="book-year">${this.bookYear}</p>
                    <h5 class="book-author">${this.bookAuthor}</h5>
                    <p class="book-publisher fw-bold">${this.bookPublisher}</p>
                    <p class="book-status">
                        <span>Status</span>
                        ${bookStatus}
                    </p>
                </div>
            </div>
        `;

        document.querySelector(".favorite-bar").innerHTML = `
                <span id="favorite" class="bi bi-star favorite-icon" style="font-size:1.5rem; color:#ffc107!important"></span>
          `;
    }

    // buat favorite icon
    // <span id="boot-icon" class="bi bi-star" style="font-size:1.5rem; color:#ffc107!important"></span>
    // <span id="boot-icon" class="bi bi-star-fill" style="font-size:1.5rem; color:#ffc107!important"></span>

    _favoriteButton(e) {
        e.preventDefault();
        try {
            this._toggleFavoriteButton(this);
            console.log(this);
        } catch (e) {
            console.log(e.message);
        }
    }

    _toggleFavoriteButton(thiss) {
        if (thiss.bookFavorite) {
            thiss.bookFavorite = false;
            e.srcElement.parentElement.innerHTML = '<i class="bi bi-star"></i>';
        } else {
            thiss.bookFavorite = true;
            e.srcElement.parentElement.innerHTML =
                '<i class="bi bi-star-fill"></i>';
        }
    }

    render() {
        let favoriteButtonIcon = "";

        if (this.bookFavorite) {
            favoriteButtonIcon = html`<i class="bi bi-star-fill"></i>`;
        } else {
            favoriteButtonIcon = html`<i class="bi bi-star"></i>`;
        }

        // favorite button
        //  <a
        //                         href="#"
        //                         @click="${this._favoriteButton}"
        //                         class="position-absolute favoriteButton"
        //                         style="right:5px; font-size: 150%"
        //                     >
        //                         ${favoriteButtonIcon}
        //                     </a>

        return html`
            <div>
                <div class="row mb-2">
                    <div class="col col-md-5 text-center ">
                        <div class="position-relative bg-dark">
                            <img
                                src="${this.bookCover}"
                                alt="book cover"
                                class="img-fluid mx-auto"
                                style="width:205px; height: 250px"
                            />
                        </div>
                    </div>
                    <div class="col col-md-7 pt-2 d-flex flex-column">
                        <div class="col">
                            <a
                                @click=${this._bookDetail}
                                class="book-field text-dark"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight"
                                data-bs-source="bookDetail"
                            >
                                <h4 class="book-title">${this.bookName}</h4>
                            </a>

                            <h5 class="book-author">${this.bookAuthor}</h5>
                            <p class="book-year">${this.bookYear}</p>
                        </div>
                        <div class="col d-flex align-items-end">
                            <div>
                                <p class="fw-bold mb-0">Kategori</p>
                                <p class="genre">${this.bookGenre}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}

customElements.define("book-card", BookCard);
