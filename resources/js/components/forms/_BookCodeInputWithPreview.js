import { html } from "lit";
import LitWithoutShadowDom from "../base/LitWithoutShadowDom";
import axios from "axios";

class BookCodeInputWithPreview extends LitWithoutShadowDom {
    static properties = {
        comId: {
            type: String,
            reflect: true,
        },
        whereForm: {
            type: String,
            reflect: true,
        },
        displayTo: {
            type: String,
            reflect: true,
        },
        cardHtml: {
            type: String,
        },
    };

    render() {
        return html`
            <div class="row g-3 align-items-center mb-2">
                <div class="col-auto">
                    <label for="bookCodeInput1" class="mb-2">Buku 1</label>
                </div>
                <div class="col-auto">
                    <input
                        type="text"
                        class="form-control mb-2 input-book"
                        name="bookCodeInput1"
                        id="bookCodeInput1"
                        value="FKWI123"
                        @change=${this._displayPreview}
                        required
                    />
                    <span
                        class="fw-bold book-name-searched-label"
                        data-sequent="0"
                    ></span>
                </div>
            </div>
        `;
    }

    async _displayPreview() {
        e.target.parentElement.querySelector(
            ".book-name-searched-label"
        ).innerHTML = "loading ....";
        e.preventDefault();
        const dataSequent = e.target.parentElement.querySelector(
            ".book-name-searched-label"
        ).dataset.sequent;

        $.ajax({
            url: '{{ route("data.get-book-by-book-code") }}',
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: new FormData(bookFormCode),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const x = data.map((element) => {
                    if (element) {
                        return `
                                    ${element.title}
                            `;
                    } else {
                        return `
                                    Data buku tidak ditemukan
                            `;
                    }
                });

                // let i = 0;
                // const bookNameSearchedLabel = document.querySelectorAll('.book-name-searched-label');

                e.target.parentElement.querySelector(
                    ".book-name-searched-label"
                ).innerHTML = x[dataSequent];

                // x.forEach(element => {
                //     bookNameSearchedLabel[i].innerHTML = element;
                //     i++;
                // });
            },
            error: function (data, textStatus, errorThrown) {
                // console.log(data);
                // data = JSON.parse(JSON.stringify(data));
                // console.log(data.err_message);
            },
        });
    }

    async _cardsBookData() {
        const booksInput = document.querySelectorAll(".input-book");
        let html = "";

        const x = await booksInput.forEach(async (bookInput) => {
            let response = await axios.post(
                "/get-book-by-book-code",
                {
                    bookCode: bookInput.value || null,
                },
                {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                }
            );

            console.log(response);
        });

        console.log(x);

        return html;
    }
}
customElements.define("book-code-input-with-preview", BookCodeInputWithPreview);
