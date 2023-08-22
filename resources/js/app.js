// LIT Components
import "./components";

import * as bootstrap from "bootstrap";

// pages
import UserIndex from "./pages/UserIndex";
import UserProfile from "./pages/UserProfile";
import Login from "./pages/auth/Login";
import UserBorrowed from "./pages/UserBorrowed.js";

const scriptSources = {
    userIndex: UserIndex,
    login: Login,
    userProfile: UserProfile,
    userBorrowed: UserBorrowed,
};

const scriptSource = document.querySelector("#dataBody").dataset.source;
const detectScriptSources = () => scriptSources[scriptSource];

window.addEventListener("DOMContentLoaded", async () => {
    const source = detectScriptSources();

    if (source) {
        source.init();
    }
});
