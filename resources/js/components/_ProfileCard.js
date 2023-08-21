import LitWithoutShadowDom from "./base/LitWithoutShadowDom";
import { html } from "lit";

class ProfileCard extends LitWithoutShadowDom {
    static properties = {
        profilePictureWithUrl: {
            type: String,
            reflect: true,
        },
    };

    _checkAvailabilityProperty() {
        if (!this.hasAttribute("profilePictureWithUrl")) {
            throw new Error(
                `Atribut "profilePictureWithUrl" harus diterapkan pada elemen ${this.localName}`
            );
        }
    }

    _profileTabChange = (e) => {
        const btnProfile = this.querySelector("#btn-profile");
        const btnPassword = this.querySelector("#btn-password");

        const tabProfile = document.querySelector("#tab-profile");
        const tabChangePassword = document.querySelector(
            "#tab-change-password"
        );

        if (e.target.id === "btn-profile") {
            btnProfile.classList.add("active");
            btnPassword.classList.remove("active");

            tabProfile.classList.remove("d-none");
            tabChangePassword.classList.add("d-none");
        } else {
            btnProfile.classList.remove("active");
            btnPassword.classList.add("active");

            tabProfile.classList.add("d-none");
            tabChangePassword.classList.remove("d-none");

            tabChangePassword.querySelector("#oldPassword").focus();
        }
    };

    render() {
        return html`
            <div class="card p-4 text-center">
                <div class="profile-img">
                    <img
                        src="${this.profilePictureWithUrl}"
                        alt="profile-img"
                    />
                    <button class="btn bg-secondary text-white">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
                <h3 class="profile-name mt-3">Fajar Sidik Setiawan</h3>
                <p class="profile-nim">2010031</p>
            </div>
            <div class="d-grid my-2 rounded ">
                <button
                    class="btn border active"
                    id="btn-profile"
                    @click="${this._profileTabChange}"
                >
                    Data Profil
                </button>
            </div>
            <div class="d-grid rounded">
                <button
                    class="btn border"
                    id="btn-password"
                    @click="${this._profileTabChange}"
                >
                    Ubah Kata Sandi
                </button>
            </div>
        `;
    }
}

customElements.define("profile-card", ProfileCard);
