// LIT Components
import "./components";

import * as bootstrap from "bootstrap";

// pages
import UserIndex from "./pages/UserIndex";
import UserProfile from "./pages/UserProfile";
import Login from "./pages/auth/Login";
import UserBorrowed from "./pages/UserBorrowed.js";
import Create1 from "./pages/LendBooks/create1";

const scriptSources = {
    userIndex: UserIndex,
    login: Login,
    userProfile: UserProfile,
    userBorrowed: UserBorrowed,
    LendBooksCreate1: Create1,
};

const scriptSource = document.querySelector("#dataBody").dataset.source;
const detectScriptSources = () => scriptSources[scriptSource];

window.addEventListener("DOMContentLoaded", async () => {
    const source = detectScriptSources();

    if (source) {
        source.init();
    }
});
